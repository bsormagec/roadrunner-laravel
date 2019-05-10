<?php

namespace Sormagec\RoadRunnerLaravel\Worker\Callbacks;

use Sormagec\RoadRunnerLaravel\Support\Stacks\CallbacksStack;

/**
 * @see \Sormagec\RoadRunnerLaravel\Worker\Worker::start()
 */
interface CallbacksInterface
{
    /**
     * Called before main loop starts.
     *
     * @return CallbacksStack
     */
    public function beforeLoopStarts(): CallbacksStack;

    /**
     * Called after incoming request was passed to the application.
     *
     * @return CallbacksStack
     */
    public function afterHandleRequestStack(): CallbacksStack;

    /**
     * Called at the end on each worker main loop iteration.
     *
     * @return CallbacksStack
     */
    public function afterLoopIterationStack(): CallbacksStack;

    /**
     * Called before incoming request passed into application.
     *
     * @return CallbacksStack
     */
    public function beforeHandleRequestStack(): CallbacksStack;

    /**
     * Called at first on each worker main loop iteration.
     *
     * @return CallbacksStack
     */
    public function beforeLoopIterationStack(): CallbacksStack;

    /**
     * Called after main loop ends.
     *
     * @return CallbacksStack
     */
    public function afterLoopEnds(): CallbacksStack;
}
