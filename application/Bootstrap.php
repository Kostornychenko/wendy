<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAcl()
    {
        $acl = new Zend_Acl();

        /*Resources*/
        $acl->addResource('index');
        $acl->addResource('auth');
        $acl->addResource('admin');
        $acl->addResource('error');

        /*Access*/
        $acl->addRole('guest');
        $acl->addRole('user', 'guest');


        $acl->allow('guest', 'index', array('index', 'site'));
        $acl->allow('guest', 'auth', array('index', 'login', 'logout'));
        $acl->allow('guest', 'error');
        $acl->allow('user', 'admin', array('index', 'main'));


        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Application_Plugin_AccessCheck($acl, Zend_Auth::getInstance()));
    }

    protected function _initRoutes() {
        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();

        $site = new Zend_Controller_Router_Route(
            ':sitename',
            array(
                'controller' => 'index',
                'action'     => 'site'
            ),
            array(
                1 => 'sitename'
            )
        );
        $router->addRoute('site', $site);

        $control = new Zend_Controller_Router_Route(
            'admin',
            array(
                'controller' => 'admin',
                'action'     => 'index'
            )
        );
        $router->addRoute('control', $control);

    }
}

