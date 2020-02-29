<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransaction;
use Laravel\Passeport\Passeport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
