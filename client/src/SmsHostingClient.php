<?php

/*
 * Copyright (c) 2017 Smshosting.it
 * All rights reserved.
 */

namespace SmsHosting;

class SmsHostingClient {

    const BASE_REST_API = 'https://api.smshosting.it/rest/api/';
    const VERSION = '0.1';

    private $authKey;
    private $authSecret;

    function __construct($authKey, $authSecret) {
        if ((!isset($authKey)) || (!$authKey) || (!isset($authSecret)) || (!$authSecret)) {
            throw new \RuntimeException("Missing auth credentials");
        }
        $this->authKey = $authKey;
        $this->authSecret = $authSecret;

        //unirest 
        \Unirest\Request::auth($authKey, $authSecret);
    }

    ## send sms requests ##

    public function sendSms($params = array()) {
        
        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'sms/send', array(), $body);
    }
    
    public function sendSmsBulk($params = array()) {
        
        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'sms/sendbulk', array(), $body);
    }
    
    public function estimateSendSms($params = array()) {
        
        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'sms/estimate', array(), $body);
    }
    
    public function cancelSms($params = array()) {
        
        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'sms/cancel', array(), $body);
    }
    
    public function searchSms($params = array()) {
        
        return \Unirest\Request::get(self::BASE_REST_API . 'sms/search', array(), $params);
    }



    ## user requests ##

    public function getUser() {
        return \Unirest\Request::get(self::BASE_REST_API . 'user');
    }

}
