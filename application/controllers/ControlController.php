<?php

class ControlController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $form = new Application_Form_Login();
        $this->view->form = $form;
    }


}



