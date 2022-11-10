<?php

namespace Neon\Error;

class ErrorHandler
{
    /**
     * @param int $display_errors
     * @param int $display_startup_errors
     * @param int $error_reporting
     */
    public function __construct(
        private readonly int $display_errors=1,
        private readonly int $display_startup_errors=1,
        private readonly int $error_reporting=E_ALL
    )
    {
        ini_set( 'display_errors', $this->display_errors );
        ini_set( 'display_startup_errors', $this->display_startup_errors );
        error_reporting( $this->error_reporting );
    }

    /**
     * @param ErrorHandleStrategy $error_handle_strategy
     *
     * @return void
     */
    public static function set_handle_strategy( ErrorHandleStrategy $error_handle_strategy ): void
    {
        set_error_handler( [$error_handle_strategy, 'error_handler'] );
        set_exception_handler( [$error_handle_strategy, 'exception_handler'] );
        register_shutdown_function( [$error_handle_strategy, 'shutdown_handler'] );
    }
}