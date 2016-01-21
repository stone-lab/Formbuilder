<?php

namespace Modules\Formbuilder\Entities;

use DB;
use Illuminate\Database\Eloquent\Model;
use Log;
use Modules\Formbuilder\Utility\FormbuilderShortcode;
use Shortcode;

class Forms extends Model
{
    protected $table = 'formbuilder__forms';
    public $translatedAttributes = [];
    protected $fillable = ['name', 'content', 'json', 'edited'];
    protected $fieldsDatas = [];

    public function mail()
    {
        return $this->hasOne('Modules\Formbuilder\Entities\FormMail', 'form_id', 'id');
    }

    public function messages()
    {
        return $this->hasOne('Modules\Formbuilder\Entities\FormMessages', 'form_id', 'id');
    }

    public function formSubmit()
    {
        return $this->hasMany('Modules\Formbuilder\Entities\FormsSubmits', 'form_id', 'id');
    }

    public function getFormMail()
    {
        if ($this->id) {
            $formMail = $this->mail;
        } else {
            $formMail = FormMail::firstOrNew(array('id' => -1));
        }

        return $formMail;
    }

    public function getFormMessages()
    {
        if ($this->id) {
            $formMessages = $this->messages;
        } else {
            $formMessages = FormMessages::firstOrNew(array('id' => -1));
        }

        return $formMessages;
    }

    public static function storeForm($data)
    {
        $bResult = false;
        $dataForm = array_get($data, 'form');
        $dataMail = array_get($data, 'mail');
        $dataMessages = array_get($data, 'messages');

        DB::beginTransaction();
        try {
            $id = !empty(array_get($dataForm, 'id', 0))?array_get($dataForm, 'id', 0):null;
            $editedContent = array_get($dataForm, 'content_edited', '');
            if ($editedContent) {
                $dataForm['content'] = $editedContent;
                $dataForm['edited'] = 1;
            }

            $formBuilder = self::firstOrNew(['id'=>$id]);

            $formBuilder->fill($dataForm)->save();
            $formId = $formBuilder->id;

            $formMail = FormMail::firstOrNew(array('form_id' => $formId));
            $formMail->fill($dataMail)->save();

            $formMessages = FormMessages::firstOrNew(array('form_id' => $formId));
            $formMessages->fill($dataMessages)->save();
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
        $content = $this->content;
        //FormbuilderShortcode::registerShortcode();
        $shortcodes = Shortcode::all();
        $pattern = $this->getRegex($shortcodes);
        preg_replace_callback("/{$pattern}/s", [&$this, 'getFieldsData'], $content);

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
