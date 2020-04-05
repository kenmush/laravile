# larryville

A complete Dealership Software

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to install the software and how to install them

* [Composer](https://getcomposer.org/download/) - Download the php dependency manager
* npm
```
npm install npm@latest -g
```
### Installation

1. Clone  development repo
```sh
git clone larryville https://github.com/Revealize/larryville
```
2. Install Composer dependencies
```sh
composer install
```
3. Install NPM packages
```sh
npm install
```
4. Create a .env file
   * Copy content of env.local  to .env  file & edit database configuration.


### Additional project features & instructions

* To add any new css/scss file to the project

   * Create the file under /resources/sass/
   * Import the file in /resources/sass/app.scss
   * Compile the file using one of below commands.

        ```sh
        npm run dev                     -- Compiles the resources assets        
        ```
        ```sh
        npm run watch                   -- Compiles the resources assets & watch for further changes
        ```
        ```sh
        npm run production              -- Compiles the resources assets & minifies them
        ```
    * The file is now compiled and added to /public/css/app.css

* To add any new js/npm package to the project

   * Create the file under /resources/js/    or   ``` npm install package_name ```
   * Require the file / npm package in /resources/js/app.js
   * Compile the file using one of below commands.

        ```sh
        npm run dev                     -- Compiles the resources assets        
        ```
        ```sh
        npm run watch                   -- Compiles the resources assets & watch for further changes
        ```
        ```sh
        npm run production              -- Compiles the resources assets & minifies them
        ```
    * The file / package is now compiled and added to /public/js/app.js   

* Use webpack.mix.js file to further customize compiling assets & folders

* NOTE : import app.css / app.js file to your header to get compiled assets / packages.

## Note

* Do not delete .env.local  as other user can use it as a default reference
* Do not delete  .env.prod  as it is necessary for production version
