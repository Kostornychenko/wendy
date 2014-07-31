<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAcl()
    {
        $acl = new Zend_Acl();

        /*Resources*/
        $acl->addResource('index');
        $acl->addResource('auth');
        $acl->addResource('control');
        $acl->addResource('error');

        /*Access*/
        $acl->addRole('guest');
        $acl->addRole('user', 'guest');


        $acl->allow('guest', 'index', array('index', 'site'));
        $acl->allow('guest', 'auth', array('index', 'login', 'logout'));
        $acl->allow('user', 'control', array('index'));
        $acl->allow('guest', 'error');

        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Application_Plugin_AccessCheck($acl, Zend_Auth::getInstance()));
    }

}

