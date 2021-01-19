<?php


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