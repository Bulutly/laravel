<?php
namespace Bulutly\Laravel\Enums\Image;

use Bulutly\Laravel\Enums\EnumTrait;

enum Type: int
{
    use EnumTrait;

    case BASE = 30000;
    case REACT_JS = 30001;
    case WORDPRESS = 30002;
    case JOOMLA = 30003;
    case MAGENTO = 30004;
    case PRESTASHOP = 30005;
    case OPENCART = 30006;
    case DRUPAL = 30007;
    case PHP = 30008;
    case NODEJS = 30009;
    case PYTHON = 30010;
    case RUBY = 30011;
    case GO = 30012;
    case JAVA = 30013;
    case DOTNET = 30014;
    case RUST = 30015;
    case C = 30016;
    case CPLUSPLUS = 30017;
    case CSHARP = 30018;
    case KOTLIN = 30019;
    case SWIFT = 30020;
    case SCALA = 30021;
    case HASKELL = 30022;
    case LISP = 30023;
    case COBOL = 30024;
    case FORTRAN = 30025;
    case PASCAL = 30026;
    case BASIC = 30027;
    case META_TRADER = 30028;
    case MYSQL = 30029;
    case POSTGRESQL = 30030;
    case MARIADB = 30031;
    case MONGODB = 30032;
    case REDIS = 30033;
    case MEMCACHED = 30034;
    case ELASTICSEARCH = 30035;
    case NEO4J = 30036;
    case RABBITMQ = 30037;
    case KAFKA = 30038;
    case APACHE = 30039;
    case NGINX = 30040;
    case TOMCAT = 30041;
    case JETTY = 30042;
    case VUE_JS = 30043;
    case APACHE_SPARK = 30044;
    case DJANGO = 30045;
    case FLASK = 30046;
    case SPRING = 30047;
    case RAILS = 30048;
    case LARAVEL = 30049;
    case SYMFONY = 30050;
    case CODEIGNITER = 30051;
    case CAKEPHP = 30052;
    case YII = 30053;
}
