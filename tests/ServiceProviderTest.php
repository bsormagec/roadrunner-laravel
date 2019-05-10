<?php

declare (strict_types = 1);

namespace Sormagec\RoadRunnerLaravel\Tests;

use Illuminate\Foundation\Application;
use Sormagec\RoadRunnerLaravel\ServiceProvider;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Sormagec\RoadRunnerLaravel\Middleware\ForceHttpsMiddleware;

/**
 * @covers \Sormagec\RoadRunnerLaravel\ServiceProvider
 */
class ServiceProviderTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testForceHttpsMiddlewareRegistered()
    {
        $this->assertTrue($this->app->make(HttpKernel::class)->hasMiddleware(ForceHttpsMiddleware::class));
    }

    /**
     * @return void
     */
    protected function afterApplicationBootstrapped(Application $app)
    {
        $app->register(ServiceProvider::class);
    }
}
