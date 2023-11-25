# Underground Website

This is the repository of the website of our underground radio. 

Used :

1. Laravel Framework which is a PHP Framework

2. HTML , CSS , JS 

3. XAMPP , MySQL , phpMyAdmin , php

# Some important notes :

1. NEVER create tables , rows in phpMyAdmin . Head to database/migrations folder and change the files there !! Check [this](https://www.youtube.com/watch?v=_LA9QsgJ0bw) for more info.

2. [Creating the db from scratch command : php artisan migrate:fresh](https://laravel.com/docs/10.x/migrations#introduction)

3. [Seeding the db can be done with command : php artisan db:seed . The seeding data can be found at database/seeders/DatabaseSeeder.php](https://laravel.com/docs/10.x/seeding#introduction)

4. [Caching and Routing in production](https://laravel.com/docs/10.x/routing#route-caching)

5. For developers looking to use the API of this site note that it is not yet implemented. You will find it in the route/api.php file.

6. If you want to add new pages go to resources\views folder , this is the only place where the View logic of the MVC pattern is located.

7. If you want to change the custom CSS , JS and images go to the public folder NOT in the resources folder !!

8. For those that want to learn more , here is a roadmap :

A. SQL basics / php basics and some OOP knowledge is required / HTML , CSS , JS basics

B. MVC pattern 

C. Views (Look at Blade) , html , css , js

D. Routes , HTTP methods , CRUD methods , RESTfull Service : What are the available methods ? What their purpose ?

E. Controllers , FormRequests , Validation

F. Migrations , Eloquent ORM , Models

G. Task Scheduling in laravel

H. Authentication (Look at starter kits) and Authorization (Look at Gates and Policies)

I. Tools : VSCode , XAMPP (Apache Server , phpMyAdmin , php) , Composer (used for php) , Node.JS (used for Vue.JS and npm is needed)

# Sources to get started :

- [VSCode download page - choose the right one for you](https://code.visualstudio.com/download)
- [VSCode Laravel Extension](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade)
- [NodeJS download page - available for all types](https://nodejs.org/en/download)
- [Video of the above three - installing for the first time](https://www.youtube.com/watch?v=2qgS_MCvDfk&list=PLnXGuXovKemRFG1Ghd6NZJXhwjaG_sQ5K)
- [Chatango - The chat of the site](https://chatango.com/)
- [How to implement CRUD in Laravel](https://www.youtube.com/watch?v=_LA9QsgJ0bw)
- [Authentication , Vue.JS](https://www.youtube.com/watch?v=ImtZ5yENzgE)
- [Laravel Authentication Starter Kits](https://laravel.com/docs/10.x/starter-kits)
- [Authorization in laravel using GATES and POLICIES](https://www.youtube.com/watch?v=q-Fl_Qcfy5o)
- [Image upload/view with validation](https://codesource.io/complete-laravel-8-image-upload-tutorial-with-example/)
- [Cookies Consent](https://github.com/spatie/laravel-cookie-consent)
- [Try-catch block to handle exceptions](https://www.tutsmake.com/laravel-try-catch/)
- [Task Scheduling](https://www.positronx.io/laravel-cron-job-task-scheduling-tutorial-with-example/)
- [XAMPP and PHP Error](https://studyopedia.com/errors-resolved/fix-php-warning-vcruntime140-dll-not-compatible/)
- [Api in Laravel](https://www.youtube.com/watch?v=YGqCZjdgJJk)
- [Making your laravel project public in your local network](https://stackoverflow.com/questions/54265275/how-to-share-a-laravel-project-on-the-local-network#:~:text=Its%20so%20much%20easy%20to%20do.%201.In%20windows,to%20share%20your%20project%20inside%20your%20same%20network.)
- [Difference between HTTP PUT and PATCH methods](https://www.geeksforgeeks.org/difference-between-put-and-patch-request/)
- [JWT Authentication - Laravel Passport](https://www.youtube.com/watch?v=TxcsU3CZQ10&list=PL_ftyCsXJUO6O7L5j9Ps295a2C3dSfuvj&index=5)
- [Below docs]

# Editing the Cookie dialog :

To edit the message go to folder : lang\vendor\cookie-consent .

To configure the cookie : config\cookie-consent.php

From the instructions in the [repository](https://github.com/spatie/laravel-cookie-consent#installation) :

The cookie domain is set by the 'domain' key in config/session.php, make sure you add a value in your .env for SESSION_DOMAIN. If you are using a domain with a port in the url such as 'localhost:3000', this package will not work until you do so.

# Cloning this repository :

- Download and install : NodeJS , XAMPP , Composer , an editor (eg VSCode)

- Create a new Folder.

- Follow [these](https://dev.to/nobleokechi/how-to-clone-and-setup-laravel-project-from-github-3oe6) instructions.

- If an error occur and is something like "...The zip extension and unzip/7z commands are both missing..." then according to [this](https://stackoverflow.com/questions/75050370/the-zip-extension-and-unzip-7z-commands-are-both-missing-skipping-in-windows) go to C:\xampp\php\php.ini file find the ";extension=zip" and uncomment it by changing it into this: "extesion=zip" 

# Logging into discord channel :

- [Check the docs](https://laravel.com/docs/10.x/logging)

- [Laravel Discord Logger](https://laravelpackages.net/marvinlabs/laravel-discord-logger)

# Laravel Hours Helper :

- [Repository](https://github.com/Label84/laravel-hours-helper)

# Delete All from a table with Eloquent :

- [Article](https://devdojo.com/bobbyiliev/how-to-delete-all-entries-in-a-table-using-laravel-eloquent#:~:text=To%20do%20the%20same%20thing%20with%20Eloquent%2C%20we,Delete%20all%20entries%20using%20the%20delete%20%28%29%20method)

# Disabled vs Readonly in HTML :

- [StackOverflow Question](https://stackoverflow.com/questions/7730695/whats-the-difference-between-disabled-disabled-and-readonly-readonly-for-ht)

# About Authentication System :

- [IEEE Best Practices for Authentication Framework / System](https://cybersecurity.ieee.org/blog/2016/06/02/design-best-practices-for-an-authentication-system/)

Summary of the above source :

In an authentication system there are several levels and a big checklist that we need to make sure we have in our application.

1. Authorization after Authentication !!

2. Authentication Patterns

3. Authentication Checklist

4. Authorization Patterns

5. Authorization Checklist

6. Other Considerations

For the purposes of this application we MUST have an Authentication System with :

1. Authorize with token

2. CSRF - OK

4. Session Cookie - OK

5. Logging (in discord) - OK 

6. Proper Password Storage - OK

7. Proper Session Management - OK

8. Credentials - OK

9. Protect against attacks (online brute force , session fixation , sql-injection , command injection , XSS )

# Authorization System

Laravel has it's own authorization system called Gates and Principles.

Principles are boolean values, their meaning is if the current user can have access to specific controller actions (methods).

# API

- [Repository Pattern , Service for Business Logic , Laravel Traits](https://stackoverflow.com/questions/60029955/when-to-use-repository-vs-service-vs-trait-in-laravel)

- [Types of APIs](https://blog.axway.com/learning-center/apis/basics/different-types-apis)

- [Adding Swagger](https://blog.quickadminpanel.com/laravel-api-documentation-with-openapiswagger/)

# REST API vs SOAP API

- [Article](https://blog.hubspot.com/website/rest-vs-soap)

- [Video](https://www.bing.com/videos/riverview/relatedvideo?&q=laravel+SOAP+api+tutorial&&mid=BA54CFFAEE1B81EAB1C9BA54CFFAEE1B81EAB1C9&&FORM=VRDGAR)

# Authorization in Laravel

- [JWT Authorization - Laravel Passport](https://www.youtube.com/watch?v=TxcsU3CZQ10&list=PL_ftyCsXJUO6O7L5j9Ps295a2C3dSfuvj&index=5)

# And then there is this guy

- [Profile](https://www.youtube.com/@Maniruzzaman/featured)

- [Laravel REST API](https://www.youtube.com/playlist?list=PL_ftyCsXJUO6O7L5j9Ps295a2C3dSfuvj)

- [Laravel Real-Time Chat](https://www.youtube.com/playlist?list=PL_ftyCsXJUO5n_vN0f2UFwt3UYRnrNOid)

- [Laravel Unit Testing](https://www.youtube.com/playlist?list=PL_ftyCsXJUO7_rOuWYJuqphLZQdOOGYU1)

- [Laravel + React](https://www.youtube.com/playlist?list=PL_ftyCsXJUO79X799gETULG6YdsFfzJeA)

Sir you are awsome !!!

# LARAVEL PHP FRAMEWORK

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
