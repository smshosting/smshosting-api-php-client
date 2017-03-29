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

    ## sms received requests ##

    public function searchSmsReceived($params = array()) {

        return \Unirest\Request::get(self::BASE_REST_API . 'sms/received/search', array(), $params);
    }

    public function getSimForReceiveSmsList() {
        return \Unirest\Request::get(self::BASE_REST_API . 'sms/received/sim/list');
    }

    ## phonebook groups requests ##

    public function getGroupList() {
        return \Unirest\Request::get(self::BASE_REST_API . 'phonebook/group/list');
    }

    public function getGroup($idGroup) {
        return \Unirest\Request::get(self::BASE_REST_API . "phonebook/group/" . $idGroup);
    }

    public function getGroupContacts($idGroup, $params = array()) {
        return \Unirest\Request::get(self::BASE_REST_API . "phonebook/group/" . $idGroup . "/contacts", array(), $params);
    }

    public function addGroup($params = array()) {

        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'phonebook/group', array(), $body);
    }

    public function updateGroup($idGroup, $params = array()) {

        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'phonebook/group/' . $idGroup, array(), $body);
    }

    public function deleteGroup($idGroup, $deleteContacts = false) {

        return \Unirest\Request::delete(self::BASE_REST_API . 'phonebook/group/' . $idGroup . '?delete_contacts=' . $deleteContacts);
    }

    ## phonebook contacts requests ##

    public function searchContacts($params = array()) {
        return \Unirest\Request::get(self::BASE_REST_API . 'phonebook/contact/search', array(), $params);
    }

    public function getContact($msisdn) {
        return \Unirest\Request::get(self::BASE_REST_API . "phonebook/contact/" . $msisdn);
    }

    public function addContact($params = array()) {

        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'phonebook/contact', array(), $body);
    }

    public function updateContact($msisdn, $params = array()) {

        $body = \Unirest\Request\Body::form($params);

        return \Unirest\Request::post(self::BASE_REST_API . 'phonebook/contact/' . $msisdn, array(), $body);
    }

    public function deleteContact($msisdn) {

        return \Unirest\Request::delete(self::BASE_REST_API . 'phonebook/contact/' . $msisdn);
    }

    ## user requests ##

    public function getUser() {
        return \Unirest\Request::get(self::BASE_REST_API . 'user');
    }

}
