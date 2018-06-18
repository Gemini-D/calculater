<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Test;

use Know\Calculater\Calculater;
use Tests\TestCase;

class BaseTest extends TestCase
{
    public $params = [
        1 => 1,
        2 => 4,
        3 => 6,
        4 => 16,
        5 => 100,
    ];

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAdd()
    {
        $calculater = new Calculater();
        $string = '+ (1) (+ (1) (2))';
        $result = $calculater->calculater($string, $this->params);
        $this->assertEquals(6, $result);

        $string = '+ (1) (+ (1) 2)';
        $result = $calculater->calculater($string, $this->params);
        $this->assertEquals(4, $result);

        $string = '+ (1) (+ 1 (5))';
        $result = $calculater->calculater($string, $this->params);
        $this->assertEquals(102, $result);
    }

    public function testMinuse()
    {
        $calculater = new Calculater();
        $string = '+ (1) (- (1) (2))';
        $result = $calculater->calculater($string, $this->params);
        $this->assertEquals(-2, $result);
    }

    public function testMultiplier()
    {
        $calculater = new Calculater();
        $string = '+ (1) (* (1) (2))';
        $result = $calculater->calculater($string, $this->params);
        $this->assertEquals(5, $result);
    }

    public function testRangeAdder()
    {
        $calculater = new Calculater();
        $string = '+ (1) (++ 1 5)';
        $result = $calculater->calculater($string, $this->params);
        $this->assertEquals(128, $result);
    }
}
