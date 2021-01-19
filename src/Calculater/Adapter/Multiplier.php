<?php

namespace Know\Calculater\Adapter;

use Know\Calculater\Adapter;

class Multiplier extends Adapter
{
    public function handle()
    {
        $result = 0;
        $first = true;
        foreach ($this->arguments as $arg) {
            $value = $this->getValue($arg);
            if ($first) {
                $result = $value;
                $first = false;
            } else {
                $result *= $value;
            }
        }
        return $result;
    }
}
