## About CheatSheet App

This project is a cheatsheet app made for myself. It helps me to quickly check Linux commands for installing and configuring PHP, Apache, NGNX, Django, FastAPI etc., without always relying on Google searches and LLMs.

## Installation

```bash
git clone https://github.com/totex/cheatsheet.git
cd cheatsheet

# enable the following extensions in php.ini: sqlite3, pdo_sqlite, zip, fileinfo

# if necessary, also set the ext dir for sqlite3
# sqlite3.extension_dir = "<php_path>\php-8.x.x\ext"

# install php dependencies
composer install

# copy .env.example to .env

# create APP_KEY: 
php artisan key:generate

# install node modules
npm install

# run node in dev mode
npm run dev

# in production run
npm run build

# run the migrations with the seeder
php artisan migrate --seed

# run the Laravel dev server if running on localhost
php artisan serve
