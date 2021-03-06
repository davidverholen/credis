<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 10/24/14
 * Time: 1:39 PM
 */

namespace DavidVerholen\Credis;
/**
 * Credis-specific errors, wraps native Redis errors
 */
class CredisException extends \Exception
{

    const CODE_TIMED_OUT = 1;
    const CODE_DISCONNECTED = 2;

    public function __construct($message, $code = 0, $exception = NULL)
    {
        if ($exception && get_class($exception) == 'RedisException' && $message == 'read error on connection') {
            $code = CredisException::CODE_DISCONNECTED;
        }
        parent::__construct($message, $code, $exception);
    }

}
