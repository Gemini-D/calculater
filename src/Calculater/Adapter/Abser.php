<?php

declare(strict_types=1);
/**
 * This file is part of Knowyourself.
 *
 * @contact  l@hyperf.io
 * @license  https://github.com/kyknow/calculater/blob/master/LICENSE
 */
namespace Know\Calculater\Adapter;

use Know\Calculater\Adapter;

class Abser extends Adapter
{
    public function handle()
    {
        $result = 0;
        foreach ($this->arguments as $arg) {
            $result += $this->getValue($arg);
        }
        return abs($result);
    }
}
