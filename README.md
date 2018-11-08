# Calculater

[![Build Status](https://travis-ci.org/kyknow/calculater.svg?branch=master)](https://travis-ci.org/kyknow/calculater)
## 安装
~~~
composer require know/calculater
~~~

## 使用
~~~php
<?php
use Know\Calculater\Calculater;

$params = [
    1 => 1,
    2 => 4,
    3 => 6,
    4 => 16,
    5 => 100,
];

$calculater = new Calculater();
$string = '+ (1) (+ (1) (2))';
$result = $calculater->calculate($string, $params); // 6

$string = '++ 1 3';
$result = $calculater->calculate($string, $params); // 11

$extParams = [
    1 => 0,
    2 => 1,
    3 => 1,
    4 => 0,
    5 => 2,
];
$string = '+ (1) (+ (1-1) (2-1))';
$result = $calculater->calculate($string, $params); // 5
~~~
