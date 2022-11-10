<?php

namespace Neon\Error;

use Throwable;

interface ErrorHandleStrategy
{
    /**
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     *
     * @return void
     */
    public static function error_handler(
        int $errno,
        string $errstr,
        string $errfile,
        int $errline
    ): void;

    /**
     * @param Throwable $exception
     *
     * @return void
     */
    public static function exception_handler( Throwable $exception ): void;

    /**
     * @param mixed ...$args
     *
     * @return void
     */
    public static function shutdown_handler( mixed ...$args ): void;
}