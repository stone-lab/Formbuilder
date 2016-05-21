<?php

namespace Modules\Formbuilder\Http\Middleware;

use Closure;
use Pingpong\Shortcode\ShortcodeFacade as Shortcode;

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
        $response = $next($request);
        $response->setContent(Shortcode::compile($response->original));

        return $response;
    }
}
