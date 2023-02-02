<?php

namespace App;

class ClassToProxy
{
    public function methodWithArgumentbyReference(&$var): void
    {
        $var = 42;
    }
}
