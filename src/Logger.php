<?php

namespace AppWatcher;

class Logger implements LoggerInterface{

    use LogHandler;

    public $appKey;
    public $appSecret;
    private $baseUrl = "http://bugs.dev/api/";
    private $url = "";


    function __construct($appKey, $appSecret){
        $this->appKey  = $appKey;
        $this->appSecret = $appSecret;
        $this->url = $this->baseUrl . $this->appKey . "/logs";
    }

    public function error($message, $tags = null){
        $this->log(0, $message, $tags);
    }

    public function warning($message, $tags = null){
        $this->log(1, $message, $tags);
    }

    public function info($message, $tags = null){
        $this->log(2, $message, $tags);
    }

}








 ?>
