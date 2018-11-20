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
В админке упрощена или отсутсвует валидация в некоторых местах  
В страницы login и register не спрятаны и хотя и не несут для пользователя пользы
Данные о посетителях не реализованы, из задания не ясно что именно должно считыватся( ip, referer, ... необходимо ли увеличивать счетчики просмотров страниц или материалов)   
Добавление файлов через админ панель не реализовано  

По файлам с одноразовами ссылками:
ccылки генерируются новые, но доступ по старым тоже остается. Тк как не было сказано дополнительно по ним.  

Файлы для подписчиков необходимо загружать в `/storage/app/public/` директорию с добавлением записи в БД.  
К примеру /storage/app/public/directory/example.file  в базу name: example.file , src: directory/example.file  

