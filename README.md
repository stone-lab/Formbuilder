# Formbuilder

**This module is working, but in a very alpha version. Using is at your own risk!**
**You are welcome to work on it**

## Requirements
To display the forms in the frontend, it requires the Shortcode Module of Pingpong Sky Labs:
http://sky.pingpong-labs.com/docs/2.0/shortcode

## Instructions
To make it work, you need to add a middleware to the Page Module.
Add a file PageMiddleware inside Modules/Page/Http/Middleware

Put follwing content into it:
```php
<?php

namespace Modules\Page\Http\Middleware;

use Closure;
use Shortcode;

class PageMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response 	= $next($request);
        $response->setContent(Shortcode::compile($response->original));
        return $response;
    }
}
```

## Permission
Don't forget to set the Permissions.

## Further
More Instructions will follow soon.