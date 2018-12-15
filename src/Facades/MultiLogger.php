<?php

namespace Truffolone\MultiLogger\Facades;

use Illuminate\Support\Facades\Facade;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MultiLogger extends Facade {

    /** @var bool $error */
    protected static $error = false;

    /** @var string $errorMessage */
    protected static $errorMessage = '';

    /**
     * @return string
     */
    protected static function getFacadeAccessor() :string
    {

        return 'MultiLogger';

    }

    /**
     * @param $message
     * @param string $file
     * @param string $level
     * @param string $channelName
     * @return bool
     */
    public static function log($message, $file = 'laravel', $level = 'info', $channelName = 'laravel') :bool
    {
        try {

            $logger = new Logger($channelName);
            $logger->pushHandler(new StreamHandler(storage_path() . '/logs/' . $file . ' .log', Logger::DEBUG));
            $logger->pushHandler(new FirePHPHandler());
            $logger->{$level}($message);

        } catch (\Exception $e) {

            self::setErrorMessage($e->getMessage());

            return false;

        }

        return true;

    }

    /**
     * @param string $message
     */
    protected static function setErrorMessage( $message = '' ) :void
    {

        self::$errorMessage = $message;
        self::$error = true;

    }

    /**
     * @return string
     */
    protected static function getErrorMessage() :string
    {

        return self::$errorMessage;

    }

}