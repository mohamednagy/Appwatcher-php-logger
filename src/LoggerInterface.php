<?php

namespace AppWatcher;

interface LoggerInterface
{
    public function error($message, $tags = null);

    public function info($message, $tags = null);

    public function warning($message, $tags = null);
}
