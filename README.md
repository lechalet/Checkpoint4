# «Solution ABC» for Strat&Growth

It is a platform intended to promote the skills of professionals in the ABC network through a system for recommending services and skills of network members and managing events.

## Getting Started for Projects

### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed

### Install

1. Clone this project
2. Run `composer install`
3. Run `yarn install`
4. Move into the directory and `cp .env .env.local` file. This one is not committed to the shared repository. Set db_name to your database name.
5. Change the user and the password in the same file by your MySQL user and password.  

### Create Database

1. Connect to mySQL with your account
2. Run `CREATE DATABASE <dbname>;`
3. Run `CREATE USER <user>@'localhost' IDENTIFIED BY '<user>';`
4. Run `GRANT ALL ON <dbname> . * TO <user>@'localhost';`
5. Run `php bin/console m:m`
6. Run `php bin/console d:m:m`
7. Run `php bin/console d:f:l`

### Working

1. Run `php bin/console server:run` to launch your local php web server
2. Run `yarn run dev --watch` to launch your local server for assets

### Testing

1. Run `./bin/phpcs` to launch PHP code sniffer
2. Run `./bin/phpstan analyse src --level max` to launch PHPStan
3. Run `./bin/phpmd src text phpmd.xml` to launch PHP Mess Detector
3. Run `./bin/eslint assets/js` to launch ESLint JS linter
3. Run `./bin/sass-lint -c sass-linter.yml` to launch Sass-lint SASS/CSS linter

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`

## Usage

Launch the server with the command below and follow the instructions on the homepage /;

`symfony server:start`


## Built With

* [Symfony](https://github.com/symfony/symfony)
* [GrumPHP](https://github.com/phpro/grumphp)
* [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHPStan](https://github.com/phpstan/phpstan)
* [PHPMD](http://phpmd.org)
* [ESLint](https://eslint.org/)
* [Sass-Lint](https://github.com/sasstools/sass-lint)
* [Travis CI](https://github.com/marketplace/travis-ci)
