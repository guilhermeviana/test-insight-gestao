## Demo



## Ambiente

- [PHP 7.2, Mysql (MariaDB 10.4)]
- [FW Laravel 7, Vue.js 2, Bootstrap 4, Axios, Webpack, VueRouter](

## Script BD

create database db_test_insight_gestao;
use db_test_insight_gestao;

create table funcionarios(
	id int primary key auto_increment,
    nome varchar(100),
    salario numeric(8,2),
    cargo varchar (50)    
);

## Comandos

1 - yarn && yarn run dev
2 - composer install
3 - php artisan serve
