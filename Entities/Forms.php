<?php

namespace Modules\Formbuilder\Entities;

use DB;
use Illuminate\Database\Eloquent\Model;
use Log;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Formbuilder\Shortcodes\FormbuilderShortcode;
use Shortcode;

class Forms extends Model
{
    protected $table = 'formbuilder__forms';
    public $translatedAttributes = [];
    protected $fillable = ['active'];
    protected $fieldsDatas = [];

    public function contents()
    {
        return $this->hasOne('Modules\Formbuilder\Entities\FormContent', 'form_id', 'id');
    }

    public function mail()
    {
        return $this->hasOne('Modules\Formbuilder\Entities\FormMail', 'form_id', 'id');
    }

    public function messages()
    {
        return $this->hasOne('Modules\Formbuilder\Entities\FormMessages', 'form_id', 'id');
    }

    public function formSubmits()
    {
        return $this->hasMany('Modules\Formbuilder\Entities\FormsSubmits', 'form_id', 'id');
    }

    public function getFormContent($locale)
    {
        return FormContent::firstOrNew(array('form_id' => $this->id, 'locale' => $locale));
    }

    public function getFormMail($locale)
    {
        return FormMail::firstOrNew(array('form_id' => $this->id, 'locale' => $locale));
    }

    public function getFormMessages($locale)
    {
        return FormMessages::firstOrNew(array('form_id' => $this->id, 'locale' => $locale));
    }

    public static function storeForm($data)
    {
        $bResult = false;

        $languages = LaravelLocalization::getSupportedLocales();

        DB::beginTransaction();
        try {
            $id            = !empty(array_get($data, 'id', 0))?array_get($data, 'id', 0):null;
            $formBuilder    = self::firstOrNew(['id'=>$id]);
            $formBuilder->fill($data)->save();
            $formId        = $formBuilder->id;

            foreach ($languages as $locale => $value) {
                $dataOfLocale    = array_get($data, $locale);
                $dataForm        = array_get($dataOfLocale, 'form');
                $dataMail        = array_get($dataOfLocale, 'mail');
                $dataMessages    = array_get($dataOfLocale, 'messages');

                $editedContent = array_get($dataForm, 'content_edited', '');
                if ($editedContent) {
                    $dataForm['content'] = $editedContent;
                    $dataForm['edited'] = 1;
                }

                $formContent = FormContent::firstOrNew(array('form_id' => $formId, 'locale' => $locale));
                $formContent->fill($dataForm)->save();

                $formMail = FormMail::firstOrNew(array('form_id' => $formId, 'locale' => $locale));
                $formMail->fill($dataMail)->save();

                $formMessages = FormMessages::firstOrNew(array('form_id' => $formId, 'locale' => $locale));
                $formMessages->fill($dataMessages)->save();
            }

            DB::commit();
            $bResult = true;
        } catch (\Exception $ex) {
            Log::info($ex);
            DB::rollback();
        }

        return $bResult;
    }

    public function getFields()
    {
        $languages = LaravelLocalization::getSupportedLocales();
        foreach ($languages as $locale => $value) {
            $content = $this->getFormContent($locale)->content;
            //FormbuilderShortcode::registerShortcode();
            $shortcodes = Shortcode::all();
            $pattern    = $this->getRegex($shortcodes);
            preg_replace_callback("/{$pattern}/s", [&$this, 'getFieldsData'], $content);
        }
        $fields = $this->fieldsDatas;

        return $fields;
    }

    public function getFieldsData($matches)
    {
        $type = array_get($matches, 2);
        $params = $this->getParameter($matches);
        $params['type'] = $type;
        $name = array_get($params, 'name');
        if ($name) {
            $this->fieldsDatas[$name] = $params;
        }

        return $type;
    }

    public function getRegex($shortcodes)
    {
        $names = array_keys($shortcodes);

        $shortcode = implode('|', array_map('preg_quote', $names));

        return
            '\\['
            . '(\\[?)'
            . "($shortcode)"
            . '(?![\\w-])'
            . '('
            . '[^\\]\\/]*'
            . '(?:'
            . '\\/(?!\\])'
            . '[^\\]\\/]*'
            . ')*?'
            . ')'
            . '(?:'
            . '(\\/)'
            . '\\]'
            . '|'
            . '\\]'
            . '(?:'
            . '('
            . '[^\\[]*+'
            . '(?:'
            . '\\[(?!\\/\\2\\])'
            . '[^\\[]*+'
            . ')*+'
            . ')'
            . '\\[\\/\\2\\]'
            . ')?'
            . ')'
            . '(\\]?)';
    }

    protected function getParameter($matches)
    {
        $params = $this->parseAttr($matches[3]);

        if (!is_array($params)) {
            $params = [$params];
        }

        return $params;
    }

    protected function parseAttr($text)
    {
        $atts = [];

        $pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';

        $text = preg_replace("/[\x{00a0}\x{200b}]+/u", ' ', $text);

        if (preg_match_all($pattern, $text, $match, PREG_SET_ORDER)) {
            foreach ($match as $m) {
                if (!empty($m[1])) {
                    $atts[strtolower($m[1])] = stripcslashes($m[2]);
                } elseif (!empty($m[3])) {
                    $atts[strtolower($m[3])] = stripcslashes($m[4]);
                } elseif (!empty($m[5])) {
                    $atts[strtolower($m[5])] = stripcslashes($m[6]);
                } elseif (isset($m[7]) and strlen($m[7])) {
                    $atts[] = stripcslashes($m[7]);
                } elseif (isset($m[8])) {
                    $atts[] = stripcslashes($m[8]);
                }
            }
        } else {
            $atts = ltrim($text);
        }

        return $atts;
    }
}
