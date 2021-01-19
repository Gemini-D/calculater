# Calculater

![PHPUnit](https://github.com/Gemini-D/calculater/workflows/PHPUnit/badge.svg)

## 安装
```
composer require genimi/calculater
```

## 使用
```php
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

// 对应的选项
$extParams = [
    1 => 0,
    2 => 1,
    3 => 1,
    4 => 0,
    5 => 2,
];

//（数字①-数字②）代表第①题的选项②（②从0开始，按顺序计。用户选此选项计单项分，未选不计）
$string = '+ (1) (+ (1-1) (2-1))'; // 1 + 0 + 4
$result = $calculater->calculate($string, $params, $extParams); // 5
```
