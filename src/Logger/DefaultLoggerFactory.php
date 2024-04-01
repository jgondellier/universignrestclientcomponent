<?php

namespace UniversignRest\ClientComponent\Logger;

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class DefaultLoggerFactory
{
    protected static Logger $instance;

    /**
     * DefaultLogger constructor.
     */
    public function __construct()
    {
        static::$instance = new Logger('default');
        $this->init();
    }

    private function init()
    {
        static::$instance->pushHandler(new StreamHandler('tmp/logs/UniversignRestComponent/app.log', Logger::DEBUG));
        static::$instance->pushHandler(new FirePHPHandler());
    }

    public static function getInstance() : Logger
    {
        if (null === static::$instance) {
            new static();
        }
        return static::$instance;
    }
}
