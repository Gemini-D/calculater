<?php

declare(strict_types=1);
/**
 * This file is part of Knowyourself.
 *
 * @contact  l@hyperf.io
 * @license  https://github.com/kyknow/calculater/blob/master/LICENSE
 */
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

namespace Tests\Test;

use Know\Calculater\Calculater;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
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
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(6, $result);

        $string = '+ (1) (+ (1) 2)';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(4, $result);

        $string = '+ (1) (+ 1 (5))';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(102, $result);
    }

    public function testMinuse()
    {
        $calculater = new Calculater();
        $string = '+ (1) (- (1) (2))';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(-2, $result);
    }

    public function testMultiplier()
    {
        $calculater = new Calculater();
        $string = '+ (1) (* (1) (2))';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(5, $result);
    }

    public function testRangeAdder()
    {
        $calculater = new Calculater();
        $string = '+ (1) (++ 1 5)';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(128, $result);
    }

    public function testDivisier()
    {
        $calculater = new Calculater();
        $string = '+ (1) (/ (5) (2))';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(26, $result);
    }

    public function testAverage()
    {
        $calculater = new Calculater();
        $string = 'AVERAGE 1 5';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(25.4, $result);
    }

    public function testParamsMoreThan10()
    {
        $params = [];
        for ($i = 0; $i < 17; ++$i) {
            $params[] = 7;
        }
        $calculater = new Calculater();
        $string = '++ 0 16';
        $result = $calculater->calculate($string, $params);
        $this->assertEquals(119, $result);

        $string = '+ (0) 16';
        $result = $calculater->calculate($string, $params);
        $this->assertEquals(23, $result);
    }

    public function testMore()
    {
        $calculater = new Calculater();
        $string = '/ (+ (1) (3) (5) (7) (9) (11) (13) (15) (17) (19) (21) (22) (26) (27) (28)) (+ (0) (2) (4) (6) (8) (10) (12) (14) (16) (18) (20) (23) (24) (25) (29))';
        $params = [];
        for ($i = 0; $i < 30; ++$i) {
            $params[] = 1;
        }
        $result = $calculater->calculate($string, $params);
        $this->assertEquals(1, $result);
    }

    public function testWithOption()
    {
        $extParams = [
            1 => 0,
            2 => 1,
            3 => 1,
            4 => 0,
            5 => 2,
        ];
        $calculater = new Calculater();
        $string = '+ (1) (+ (1-1) (2-1))';
        $result = $calculater->calculate($string, $this->params, $extParams);
        $this->assertEquals(5, $result);
    }

    public function testAbser()
    {
        $calculater = new Calculater();
        $string = 'ABS (+ (1) (- (1) (2)))';
        $result = $calculater->calculate($string, $this->params);
        $this->assertEquals(2, $result);
    }
}
