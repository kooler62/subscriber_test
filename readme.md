## How ti install the project
  
 1. `git clone https://github.com/kooler62/subscriber_test`  
 2. cd to project directory and `composer install`  
 3. copy .env.example to .env   `cp .env.example .env` 
 4. `php artisan key:generate`
 5. create database  
 6. configure .env file with your database     
 7.    php artisan migrate --seed  
 8. `php artisan serve` visit site on `http://127.0.0.1:8000`
 
 

p.s. по заданию
В админке навигацию в шапке или хлебные крошки не делал
В админки упрощена или отсутсвует валидация в некоторых местах
В страницы login и register не спрятаны и хотя и не несут для пользователя пользы