# Formbuilder

**This module is working, but in a very alpha version. Using is at your own risk!**
**You are welcome to work on it**

## Requirements

**IMPORTANT: YOU NEED FIRST INSTALLL THE SHORTCODE PACKAGE***

To display the forms in the frontend, it requires the Shortcode Module of Pingpong Sky Labs:

http://sky.pingpong-labs.com/docs/2.0/shortcode

Due Pingponglabs changed the parse logic in the newest version, an incompatibility in some cases could occure.
That's why we will fix the version to 2.1.

Please add this to your composer.json file:
```php
    "pingpong/shortcode": "2.1",
```


For captcha image, we use the package from Drew Phillips https://www.phpcaptcha.org/

Please add this to your composer.json file:
```php
    "dapphp/securimage": "~3.5"
```
Link to GitHub: https://github.com/dapphp/securimage

## Instructions
To make it work, you need to add a middleware to the Page Module.

Add a file PageMiddleware.php inside Modules/Page/Http/Middleware

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

Adjust the routes in Modules/Page/Http/frontendRoutes.php to 
```php
    $router->get('{uri}', ['middleware'=>'page','uses' => 'PublicController@uri', 'as' => 'page']);
    $router->get('/', ['middleware'=>'page','uses' => 'PublicController@homepage', 'as' => 'homepage']);
```

And add to app/Http/Kernel.php to $routeMiddleware
```php
        'page' => 'Modules\Page\Http\Middleware\PageMiddleware',
```

Now you can install the Formbuilder
Please add this to your composer.json file:
```php    
    "stonelab/formbuilder": "~1.0"
```

That's it.

## Permission
Don't forget to set the Permissions.

## Notice
At the moment, the output are Bootstrapped Fields and Wrappers. This will be changed in the future.

## TODO
Make Layout more flexible