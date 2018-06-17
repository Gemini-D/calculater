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
$result = $calculater->calculater($string, $params);
$this->assertEquals(6, $result);
~~~