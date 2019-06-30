# Exe-Loader server
##### Simple strange project
## Requirements
* [nginx 1.14.0](https://www.nginx.com/) или Apache (или вместе)
* [php 7.2.11](https://github.com/php/php-src/releases/tag/php-7.2.11)
* [Laravel](https://github.com/laravel/laravel)
* [Voyager](https://github.com/the-control-group/voyager)
* [Bootstrap 3.3.7](https://getbootstrap.com/docs/3.3/)
* [VueJS 2.3.4](https://vuejs.org/v2/guide/) (in admin panel)
## Routes
```
    Route::get('/register-computer', 'ComputerController');
    Route::get('/get-task/{computer}', 'TaskController')->middleware('checkStatus');
```

## Installation
Настройте окружение для проекта (в зависимости от того что вы выбирете). Вот ссылки они вам помогут
Тут уже дело вкуса, поэтому выбирайте сами. Если что пишите.

[Deploy Laravel Application With LEMP Stack (Ubuntu and Enginx)](https://medium.com/@sagarnasit/deploy-laravel-application-with-lemp-stack-ubuntu-and-enginx-e82a4445b3d2)

[How To Deploy a Laravel Application with Nginx on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-deploy-a-laravel-application-with-nginx-on-ubuntu-16-04)

Загрузите распакованную папку в место установки.

Откройте файл .env и поменяйте данные там где я написал на кириллице на свои в следующих местах
(данные вводить без пробелов)
```
APP_NAME=Имяпроекта
APP_URL=ваш домен без слэша в конце (https://url.com)

DB_CONNECTION=mysql(тип базы данных (если у вас mysql то оставьте как есть))
DB_HOST=127.0.0.1(хост или домен на котором хранится база)
DB_PORT=3306
DB_DATABASE=exe-loader(имя базы данных)
DB_USERNAME=root(имя пользователя базы данных)
DB_PASSWORD=(пароль)
```
откройте консоль
Запустите очищение кэша
```
php artisan cache:clear
```
запустите команду дампа (убедитесь что у вас установлен composer)
```
composer dump-autoload
```
И обновление пакетов
```
composer update
```
Сгенерировать ключ приложения
```
php artisan key:generate
```
Затем импротируйте sql файл в  вашу базу данных (предварительно создайте ее) (она должны быть пуста)
Почему sql файл? Потому что там есть все настройки админки(просто некоторые настройки хранятся в базе данных)

Для создания админа запустите следующую команду (не забудьте поменять емайл на свой) (в дальнейшем создать админа моэно будет и в админке или просто поменять роль юзера)
```
php artisan make:admin youremail@gmail.com --create
```
И введите данные которые запросит система.

Все админка установлена.