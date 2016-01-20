<?php

namespace Modules\Formbuilder\Utility;

use Illuminate\View\View;
use Modules\Formbuilder\Entities\Forms;
use Shortcode;

class FormBuilderShortcode
{
    public static function registerSubmitShortcode($key, $value)
    {
        Shortcode::register($key, function ($attr, $content = null, $name = null) use ($value) {
            $text = Shortcode::compile($content);

            return $value;
        });
    }

    public function form($attr, $content = null, $name = null)
    {
        $idForm = (int) array_get($attr, 'id');
        $form = Forms::find($idForm);
        if ($form->id) {
            $templateForm = 'formbuilder::front.form';

            $content = view($templateForm, compact('form', 'attr'))->render();
        }

        return $content;
    }

    public function textinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.textinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function passwordinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.passwordinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function searchinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.searchinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function prependedtext($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.prependedtext';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function appendedtext($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.appendedtext';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function prependedcheckbox($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.prependedcheckbox';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function appendedcheckbox($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.appendedcheckbox';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function buttondropdown($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.buttondropdown';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function textarea($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.textarea';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function multiplecheckboxes($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multiplecheckboxes';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function multiplecheckboxesinline($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multiplecheckboxesinline';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function multipleradios($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multipleradios';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function multipleradiosinline($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multipleradiosinline';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function selectbasic($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.selectbasic';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function selectmultiple($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.selectmultiple';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function filebutton($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.filebutton';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function button($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.button';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function buttondouble($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.buttondouble';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function emailinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.emailinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function urlinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.urlinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function telinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.telinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function dateinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.dateinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }

    public function numberinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.numberinput';

        $html = view($template, compact('attr'))->render();

        return $html;
    }
}
