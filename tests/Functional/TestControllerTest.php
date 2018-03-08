<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 10:12:38
 *
 */

namespace Tests\Functional;

use App\Controllers\TestController;

/**
 * TestController PHPUnit
 *
 */
class TestControllerTest extends BaseTestCase
{
    public function testGetRoute()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }
}