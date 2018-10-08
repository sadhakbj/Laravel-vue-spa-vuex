# VueJs SPA using Laravel

This repo contains a single page application developed using VueJs and Laravel.

Production Link : NA
Staging Link : NA

## Code Quality and Test Coverage

Project is on [code climate](https://codeclimate.com/github/puncoz/Laravel-vue-spa-vuex).

[![Maintainability](https://api.codeclimate.com/v1/badges/2b8b29594c0e53c2d524/maintainability)](https://codeclimate.com/github/puncoz/Laravel-vue-spa-vuex/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/2b8b29594c0e53c2d524/test_coverage)](https://codeclimate.com/github/puncoz/Laravel-vue-spa-vuex/test_coverage)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

* PostgresSql/MySql Database
* Default laravel Prerequisites (PHP ^7.1.3 and Laravel 5.7)
* Node => v10+ and Npm => v6.1+

### Installation

This project can be cloned from github repo:

* ```git clone git@github.com:puncoz/Laravel-vue-spa-vuex.git```
* ```cd Laravel-vue-spa-vuex```
* ```cp .env.example .env```
* ```php artisan key:generate```
* Update .env to match your machine environment
* ```composer install && yarn```
* To compile js and sass assets:
* ```yarn watch``` or ```yarn dev``` or ```yarn prod```
* use valet or configure Apache\Nginx server for serve or simply run by using laravel's serve functionility
* ```php artisan serve```

## Running the tests

* Full PHPUnit test ``` ./vendor/bin/phpunit   ```
* PHPUnit Test watch ``` npm run tdd```


## Deployment

We use Capistrano for deployment to stagging and production server

* Deploying to stagging server ```cap stagging deploy branch=branch-name``` or
* Deploying to production server ```cap production deploy branch=branch-name``` or

## Built With

* [Laravel](http://laravel.com/) - The web framework used
* [VueJs](https://vuejs.org/) - JS framework
* [composer](https://vuejs.org/) - Php Dependency Management
* [npm](https://npmjs.org/) - Node Dependency Management

## Versioning

We use [Git](https://git-scm.com/) for versioning. For the versions available, see the [tags on this repository](https://github.com/puncoz/Laravel-vue-spa-vuex/tags).

## Style Guide For Vue Components

Coming Soon.
