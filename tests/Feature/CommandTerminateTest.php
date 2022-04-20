<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class CommandTerminateTest extends TestCase
{
    public function test_that_a_command_calls_terminate()
    {
        Log::shouldReceive('debug')
            ->once()
            ->withArgs(function ($message) {
                return strpos($message, 'Application is terminating') !== false;
            });

        $this->artisan('some:command');
    }

    public function test_that_log_is_created_on_terminate()
    {
        Log::shouldReceive('debug')
            ->once()
            ->withArgs(function ($message) {
                return strpos($message, 'Application is terminating') !== false;
            });

        $this->artisan('some:command');

        $this->app->terminate();
    }
}
