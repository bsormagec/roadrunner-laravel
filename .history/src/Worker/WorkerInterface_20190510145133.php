<?php

namespace Sormagec\RoadRunnerLaravel\Worker;

interface WorkerInterface
{
    /**
     * Environment value name for passing application base path.
     */
    const ENV_NAME_APP_BASE_PATH = 'APP_BASE_PATH';

    /**
     * Environment value name for passing application bootstrap file path.
     */
    const ENV_NAME_APP_BOOTSTRAP_PATH = 'APP_BOOTSTRAP_PATH';

    /**
     * Environment value name for forcing "https" schema.
     */
    const ENV_NAME_APP_FORCE_HTTPS = 'APP_FORCE_HTTPS';

    /**
     * Start worker events loop.
     *
     * @return void
     */
    public function start();
}
