# Fat Free Framework Starter

PHP lightweight app starter with F3 (Fat Free Framework) configured in a modern structure close to Laravel.
It comes prebuilt with
- Laravel-mix for assets compilation
- Phinx for database migrations and seeding
- TailwindCSS as CSS framework
- Dotenv variables

## Pre-Requists

* WebServer (Apache or Nginx)
* PHP (>= 7.2 recommended)
* Composer
* NodeJS (with NPM or Yarn)

## Installation

Install php dependencies (if you don't need Phinx and want the most lightweight version possible add the **--no-dev** parameter)

```
composer install
```

Copy or rename the file  **.env.example** to **.env**
 
### VirtualHost Configuration

Configure your host to point to the **public** directory 

```
<VirtualHost *:80>
    DocumentRoot "/var/www/f3-starter/public"
    ServerName f3.local
    <Directory "/var/www/f3-starter/public">
            AllowOverride All
            Options FollowSymLinks +Indexes
            Order allow,deny
            Allow from all
    </Directory>
</VirtualHost>
```

## Application Structure

The directory structure is close to Laravel to offer a modern and more secure architecture.
The **app** folder is autoloaded and can contain your models/controllers/...
The **config** directory can contain your config files currently in the F3 .ini format.
The **public** is the only folder that need to be accessible to your host with the index.php file and all compiled assets.
The **resources** folder  contains the uncompiled assets and the template files in the [F3 Template Language](https://fatfreeframework.com/3.6/views-and-templates#AQuickLookattheF3TemplateLanguage)
The **var** folder is for temporary files and logs.

## Database

If you are planning to use a database you can configure connection settings in the **.env** file.  
Currently **mysql**, **pgsql** and **sqlite** database connectors are implemented. 
The connection is established in the **bootstrap.php** file as F3 DB\SQL object which is included in the console, the public index.php and phinx.php (the pdo) for migrations and seeds.
If you want to check the configuration with the command

```
vendor/bin/phinx test
```

You can see the phinx documentation (f3-starter is configured with phinx folders in **/database/**

[https://book.cakephp.org/phinx/](https://book.cakephp.org/phinx/)

For F3 (and console) the database is set to the variable DB variable. See the F3 documentation for mapping and request builder

[https://fatfreeframework.com/3.6/databases](https://fatfreeframework.com/3.6/databases)


## Frontend Assets

For frontend assets modifications you will need to install required dependencies

```bash
#if you use npm 
npm install
#or yarn
yarn install
```

The starter is configured with tailwindcss and laravel-mix. You can use the commands **dev** and **prod** npm commands for compilation.

```bash
npm run prod
```
Check the laravel mix and tailwindcss documentation for more informations.
- [https://laravel-mix.com/docs/5.0/basic-example](https://laravel-mix.com/docs/5.0/basic-example)
- [https://tailwindcss.com/docs/installation/](https://tailwindcss.com/docs/installation/)

## Console

On the root of the application a **console** file hold a new F3 instance with the database configuration and a base class for output render.
It can be called simply in CLI, if you run without argument it should output the name of your application defined in your app config file.

```bash
php console
```

You can read the CLI routes implementation in F3

[https://fatfreeframework.com/3.6/routing-engine#RoutinginCLImode](https://fatfreeframework.com/3.6/routing-engine#RoutinginCLImode)

For example to add a new *test* command you can add this line in your console

```php
$f3->route('GET /test [cli]',  function($f3){
	Console::log('My Test Command');
});
```

and call it with

```bash
php console test
```
