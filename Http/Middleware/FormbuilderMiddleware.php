<?php

namespace Modules\Formbuilder\Http\Middleware;

use Closure;
use Modules\Formbuilder\Shortcodes\FormBuilderShortcode;
use Shortcode;

class FormbuilderMiddleware
{
    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        FormBuilderShortcode::registerShortcode();
        $response = $next($request);
        $html = Shortcode::compile($response->original);
        //$html = Shortcode::compile($html);
        $response->setContent(Shortcode::compile($response->original));

        return $response;
    }
}
