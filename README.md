# Laravel Blog Engine (LBE)

## About this project

Laravel Blog Engine (LBE) is a blog content management system built with Laravel. This is a project is features the following features:

- Posts: CRUD capabilities.
- Categories and tag support (with CRUD capabilities).
- Front-end technologies: HTML5, Blade, Bootstrap 5.x and CKEditor 5.x.
- Back-end technologies: PHP 7.x, MySQL 8.x, Docker and Laravel 8.x.

### Coming Soon:

- User management.
- SEO support.

### The following Laravel features are implemented/used/demonstrated:

- Models, controllers, routes and request validations.
- Migrations, factories and a seeder.
- Pivot tables and relationships.
- Blade templating.
- Appropriate HTML Purification (Courtesy of [HTMLPurifier for Laravel](https://github.com/mewebstudio/Purifier))

## Requirements

- Docker

## How to download & install

```bash
git pull upstream ...
cd blog-engine
```

## How to run (Laravel Sail - preferred method)

Note: More about [Laravel Sail](https://laravel.com/docs/8.x/sail) here.

```bash
./vendor/bin/sail up -d
```

## Update the dependencies via Composer

```bash
./vendor/bin/sail composer update
```

## How to access

Open up your web browser to http://localhost

## Dependencies & libraries in use

- [Laravel](https://github.com/laravel/framework)
- [Bootstrap](https://github.com/twbs/bootstrap)
- [CKEditor](https://github.com/ckeditor/ckeditor5)
- [HTMLPurifier for Laravel](https://github.com/mewebstudio/Purifier)
- [Tagin for Bootstrap](https://github.com/erwinheldy/tagin)

## Licenses

- This Laravel Blog Engine (LBE) project is open-source; free to use and modify.
- The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).