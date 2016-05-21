# Formbuilder

**This module is working, but in a very alpha version. Using is at your own risk!**
**You are welcome to work on it**

## Table of contents

Prerequisites  
Installation  
Permission  
Usage  
Notice  
Troubleshoot  
Todo  

## Prerequisites

Due the package ist based on several prerequisites, you need follow the following steps:
1. Install Pingponglabs Shortcode Package
2. Install PHP Captcha
3. Adjust and integrate Middleware
4. Install Formbuilder

Please follow the installation instructions below step by step.

## Installation

### 1. Install Pingponglabs Shortcode Package

To display the forms in the frontend, it requires the Shortcode Module of Pingpong Sky Labs:  
http://sky.pingpong-labs.com/docs/2.0/shortcode  
Due Pingponglabs changed the parse logic in the newest version, an incompatibility in some cases could occure.
That's why we will fix the version to 2.1.

Please add this to your composer.json file:
```php
    "pingpong/shortcode": "2.1",
```

Next, open a terminal and run.
```php
    composer update 
```

After the composer updated. Add new service provider in config/app.php.
```php
  'Pingpong\Shortcode\ShortcodeServiceProvider'
```

Add new Facade alias.
```php
'Shortcode'       => 'Pingpong\Shortcode\ShortcodeFacade',
```
Done.

### 2. Install PHP Captcha

For captcha image, we use the package from Drew Phillips https://www.phpcaptcha.org/

Please add this to your composer.json file:
```php
    "dapphp/securimage": "~3.5"
```

and run composer update.  
Link to GitHub: https://github.com/dapphp/securimage


### 3. Adjust and integrate Middleware

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
        $response   = $next($request);
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
### 4. Install Formbuilder 

Now you can install the Formbuilder
Please add this to your composer.json file:
```php    
    "stonelab/formbuilder": "~1.0"
```
and run composer update again.

That's it.

### 5. Permission
Don't forget to set the Permissions for the newly added Formbuilder module.

## Usage

You can mangage your forms in backend under the Formbuilder seciton.
While you're creating your form, pleas make sure you filled out all necessary datas on all section and languages (specially mail section), esle you will lose your created form when you try to save and you need to do it again. this will be solved in future release.
For every you form you've created you'll get an form id which you can you use through the shortcode.

The shortcode looks like:
```php  
    [form id=1]
```

you can put this shortcode wherevery you want in the an page content.

All submitted forms are automatically stored and you can see it in the backend.

## Notice
At the moment, the output are Bootstrapped Fields and Wrappers. This will be changed in the future.

## Troubleshoot
Error: Shortcode not found  
You need first setup the Shortcode package. When this error appears, it means you not have added the alias under config/app.php.

Form could not be sent  
Please check you mail driver under config/mail.php  
When it's set up correctly, then check if you have set up valid mail addresses your form mail settings.

## TODO
Fix losing data when not filled out all necessary datas due saving.
Make Layout more flexible