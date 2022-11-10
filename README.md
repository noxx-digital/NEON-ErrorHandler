# NEON-ErrorHandler

Error handler that takes `set_error_handler`, `set_exception_handler` `register_shutdown_function` callbacks from a 
strategy design pattern. So it can be exchanged at runtime.

```
composer require noxx/neon-error-handler
```
## Usage

```php
<?php

namespace Neon;

use Throwable;

class PlainErrorHandleStrategy implements ErrorHandleStrategy
{
    /*
     *
     */
    public static function error_handler(
        int $errno,
        string $errstr,
        string $errfile,
        int $errline
    ): void
    {
       echo $errno.'<br>'.$errstr.'<br>'.$errfile.'<br>'.$errline.'<br>';
    }

    /*
     *
     */
    public static function exception_handler( Throwable $exception ): void
    {
       print_r($exception);
    }

    /*
     *
     */
    public static function shutdown_handler( ...$args ): void
    {
        header('Content-Type: text/plain' );
    }
}
```

```php
namespace Neon;

require __DIR__ . '/../vendor/autoload.php';

ErrorHandler::set_handle_strategy( new PlainErrorHandleStrategy() );

trigger_error( 'TEST', E_USER_ERROR );
```