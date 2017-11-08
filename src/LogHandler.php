<?php

namespace AppWatcher;

use AppWatcher\Exceptions\ValidationException;
use AppWatcher\Exceptions\ForbiddenException;
use AppWatcher\Exceptions\GeneralException;

trait LogHandler {

    private function log($level, $message, $tags){
        $client = new \GuzzleHttp\Client();
        $promise = $client->requestAsync('POST', $this->url, [
           'json' => [
               'type' => $level,
               'log' => $message,
               'tags' => $tags
           ],
           'headers' => [
               'content-type' => 'application/json',
               'app-key' => $this->appKey,
               'app-secret' => $this->appSecret,
           ]
        ]);
        $promise->then(
        function($response){
            echo (string) $response->getBody();
        },function($reason){
            if($reason->getCode() == 422){
               throw new ValidationException($reason->getMessage());
            }else if($reason->getCode() == 403){
               throw new ForbiddenException($reason->getMessage());
            }else{
               throw new GeneralException($reason->getMessage(), $reason->getCode());
            }
        })->wait();
    }
}




 ?>
