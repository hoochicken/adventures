# adventures

## requirements

| Requirement | Source | Note |
| --- | --- | --- |
yarn | <https://classic.yarnpkg.com/en/docs/install/#windows-stable> |
npm | <https://nodejs.org/en/download/> | 
php | <https://windows.php.net/download/> | php.ini mit aktiviertem Modul extension=pdo_mysql
composer | <https://getcomposer.org/download/> | 

## kick-starting the project

* get repository from <https://github.com/hoochicken/adventures.git>

~~~cli
## client ? 
yarn install

## server ? 
composer install
~~~

## running the project

```
# start vue, awaits you on http://127.0.0.1:8080/ 
cd adv-client
yarn serve

# start backend, awaits you on http://127.0.0.1:8000/
cd adv-server
php -S 127.0.0.1:8000 -t public

# start dockers for mysql
docker-compose up
# phpmyadmin exposed to 8081, so: http://127.0.0.1:8081/
```

## endpoints

| Type | Name | Url |
| --- | --- | --- |
Frontend | vue | <http://127.0.0.1:8080/>
Backend | Symfony | <http://127.0.0.1:8000/>
Database | phpMyAdmin | <http://127.0.0.1:8081/>

## based on

* <https://gist.github.com/jcavat/2ed51c6371b9b488d6a940ba1049189b>
* <https://developer.okta.com/blog/2018/06/14/php-crud-app-symfony-vue>
