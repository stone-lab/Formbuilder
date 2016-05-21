<?php

namespace Modules\Formbuilder\Shortcodes;

use Illuminate\View\View;
use Modules\Formbuilder\Entities\Forms;
use Pingpong\Shortcode\ShortcodeFacade as Shortcode;

class FormbuilderShortcode
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

        return view($template, compact('attr'))->render();
    }

    public function passwordinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.passwordinput';

        return view($template, compact('attr'))->render();
    }

    public function searchinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.searchinput';

        return view($template, compact('attr'))->render();
    }

    public function prependedtext($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.prependedtext';

        return view($template, compact('attr'))->render();
    }

    public function appendedtext($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.appendedtext';

        return view($template, compact('attr'))->render();
    }

    public function prependedcheckbox($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.prependedcheckbox';

        return view($template, compact('attr'))->render();
    }

    public function appendedcheckbox($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.appendedcheckbox';

        return view($template, compact('attr'))->render();
    }

    public function buttondropdown($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.buttondropdown';

        return view($template, compact('attr'))->render();
    }

    public function textarea($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.textarea';

        return view($template, compact('attr'))->render();
    }

    public function multiplecheckboxes($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multiplecheckboxes';

        return view($template, compact('attr'))->render();
    }

    public function multiplecheckboxesinline($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multiplecheckboxesinline';

        return view($template, compact('attr'))->render();
    }

    public function multipleradios($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multipleradios';

        return view($template, compact('attr'))->render();
    }

    public function multipleradiosinline($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.multipleradiosinline';

        return view($template, compact('attr'))->render();
    }

    public function selectbasic($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.selectbasic';

        return view($template, compact('attr'))->render();
    }

    public function selectmultiple($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.selectmultiple';

        return view($template, compact('attr'))->render();
    }

    public function filebutton($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.filebutton';

        return view($template, compact('attr'))->render();
    }

    public function button($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.button';

        return view($template, compact('attr'))->render();
    }

    public function buttondouble($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.buttondouble';

        return view($template, compact('attr'))->render();
    }

    public function emailinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.emailinput';

        return view($template, compact('attr'))->render();
    }

    public function urlinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.urlinput';

        return view($template, compact('attr'))->render();
    }

    public function telinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.telinput';

        return view($template, compact('attr'))->render();
    }

    public function dateinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.dateinput';

        return view($template, compact('attr'))->render();
    }

    public function numberinput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.numberinput';

        return view($template, compact('attr'))->render();
    }

    public function captchainput($attr, $content = null, $name = null)
    {
        $template = 'formbuilder::front.form.captchainput';

        return view($template, compact('attr'))->render();
    }
}
