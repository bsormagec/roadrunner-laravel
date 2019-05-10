<?php

declare (strict_types = 1);

namespace Sormagec\RoadRunnerLaravel\Tests\Worker\Callbacks;

use Illuminate\Support\Traits\Macroable;
use Sormagec\RoadRunnerLaravel\Tests\AbstractTestCase;
use Sormagec\RoadRunnerLaravel\Worker\Callbacks\Callbacks;
use Sormagec\RoadRunnerLaravel\Support\Stacks\CallbacksStack;
use Sormagec\RoadRunnerLaravel\Worker\Callbacks\CallbacksInterface;

class CallbacksTest extends AbstractTestCase
{
    /**
     * @var Callbacks
     */
    protected $callbacks;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->callbacks = new Callbacks;
    }

    /**
     * @return void
     */
    public function testInterfacesAndTraits()
    {
        $this->assertClassUsesTraits(Callbacks::class, Macroable::class);
        $this->assertInstanceOf(CallbacksInterface::class, $this->callbacks);
    }

    /**
     * @return void
     */
    public function testAccessorMethodsArePresented()
    {
        $this->assertInstanceOf(CallbacksStack::class, $this->callbacks->afterHandleRequestStack());
        $this->assertInstanceOf(CallbacksStack::class, $this->callbacks->afterLoopIterationStack());
        $this->assertInstanceOf(CallbacksStack::class, $this->callbacks->beforeHandleRequestStack());
        $this->assertInstanceOf(CallbacksStack::class, $this->callbacks->beforeLoopIterationStack());
    }
}
