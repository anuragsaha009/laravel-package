# laravel-package
First We need to create the folder structure for our package.

packages/MyVendor/tags/

First follow the folder struture .

	MyVendor
        └── tags
            └── src
                ├── Database
                │   └── migrations
                ├── Http
                │   └── controllers
                ├── Models
                ├── resources
                │   └── views
                └── routes


 At the roo of the package ,open a terminal and run
 $ composer init

 A composer.json file will be create that look like that 
 {
    "name": "package/tags",
    "description": "Package for tag management",
    "authors": [
        {
            "name": "Anurag Saha",
            "email": "anuragsaha00@gmail.com"
        }
    ]
}

In created composer.js, we need to tell the autoload files and add following code to your composer.json

	"autoload": {
            "psr-4": {
                "MyVendor\\tags\\": "src/"
            }
        }

 Now we need to create  service provider for our package.
 php artisan make:provider TagServiceProvider

 This will create a new file located at app/Providers/TagServiceProvider.php
 Let's move this file into our package folder 

 packages/MyVendor/tags/src/TagServiceProvider.php

 Inside our service provider we need to change few things like namespace(that is defined in composer.json)
 then inside the root of our Laravel app in the composer.json add following codes

 	"autoload": {
            "classmap": [
                "database/seeds",
                "database/factories"
            ],
            "psr-4": {
                "MyVendor\\tags\\": "packages/MyVendor/tags/src",
                "App\\": "app/"
            } 
        },
        "autoload-dev": {
            "psr-4": {
                "MyVendor\\tags\\": "packages/MyVendor/tags/src",
                "Tests\\": "tests/"
            }
        },

Open a terminal and run: $ composer dump-autoload

Inside the boot method of Service Provider add a route,migrations,views etc in following away
$this->loadRoutesFrom(__DIR__.'/routes/web.php');
$this->loadMigrationsFrom(__DIR__.'/Database/migrations');
$this->loadViewsFrom(__DIR__.'/resources/views', 'add');
(Note : __DIR__ refers to the current directory  )

Now we need to add our newly created TagServiceProvider in our root config/app.php inside the providers array

// config/app.php
    'providers' => [
        MyVendor\tags\TagServiceProvider::class,
    ],

In our package routes folder add the web.php file

Route::get('tags', function(){
        return 'Tag Managment...';
});

$ php artisan serve
