<?php

class ControlController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $user = Zend_Auth::getInstance()->getIdentity();
        $sitename = $user->sitename;
        $site = new Application_Model_DbTable_Sites();
        $this->view->data = $site->getSite($sitename);

    }

    public function mainAction()
    {


    }

}



