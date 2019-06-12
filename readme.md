# Exe-Loader server
##### Simple strange project
## Requirements
* [nginx 1.14.0](https://www.nginx.com/)
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