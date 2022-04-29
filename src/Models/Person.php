<?php

namespace Lucas\AjaxInModal\Models;

class Person
{
    public function __construct(
        public readonly string $name,
        public readonly int $age,
    ) {
    }
}
