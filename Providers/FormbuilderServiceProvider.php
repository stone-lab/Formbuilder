<?php

namespace Modules\Formbuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Shortcode;

class FormbuilderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerBindings();
        $this->registerShortcode();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        // add bindings
    }

    public static function registerShortcode()
    {
        Shortcode::register('form', 'Modules\Formbuilder\Utility\FormBuilderShortcode@form');
        Shortcode::register('textinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@textinput');
        Shortcode::register('passwordinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@passwordinput');
        Shortcode::register('searchinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@searchinput');
        Shortcode::register('prependedtext', 'Modules\Formbuilder\Utility\FormBuilderShortcode@prependedtext');
        Shortcode::register('appendedtext', 'Modules\Formbuilder\Utility\FormBuilderShortcode@appendedtext');
        Shortcode::register('prependedcheckbox', 'Modules\Formbuilder\Utility\FormBuilderShortcode@prependedcheckbox');
        Shortcode::register('appendedcheckbox', 'Modules\Formbuilder\Utility\FormBuilderShortcode@appendedcheckbox');
        Shortcode::register('buttondropdown', 'Modules\Formbuilder\Utility\FormBuilderShortcode@buttondropdown');
        Shortcode::register('textarea', 'Modules\Formbuilder\Utility\FormBuilderShortcode@textarea');
        Shortcode::register('multiplecheckboxes', 'Modules\Formbuilder\Utility\FormBuilderShortcode@multiplecheckboxes');
        Shortcode::register('multiplecheckboxesinline', 'Modules\Formbuilder\Utility\FormBuilderShortcode@multiplecheckboxesinline');
        Shortcode::register('multipleradios', 'Modules\Formbuilder\Utility\FormBuilderShortcode@multipleradios');
        Shortcode::register('multipleradiosinline', 'Modules\Formbuilder\Utility\FormBuilderShortcode@multipleradiosinline');
        Shortcode::register('selectbasic', 'Modules\Formbuilder\Utility\FormBuilderShortcode@selectbasic');
        Shortcode::register('selectmultiple', 'Modules\Formbuilder\Utility\FormBuilderShortcode@selectmultiple');
        Shortcode::register('filebutton', 'Modules\Formbuilder\Utility\FormBuilderShortcode@filebutton');
        Shortcode::register('button', 'Modules\Formbuilder\Utility\FormBuilderShortcode@button');
        Shortcode::register('buttondouble', 'Modules\Formbuilder\Utility\FormBuilderShortcode@buttondouble');
        Shortcode::register('emailinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@emailinput');
        Shortcode::register('urlinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@urlinput');
        Shortcode::register('telinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@telinput');
        Shortcode::register('dateinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@dateinput');
        Shortcode::register('numberinput', 'Modules\Formbuilder\Utility\FormBuilderShortcode@numberinput');
    }
}
