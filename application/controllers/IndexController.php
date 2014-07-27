<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->layout()->disableLayout();
        $form = new Application_Form_Register();
        $this->view->form = $form;
    }

    public function siteAction()
    {
        $this->_helper->layout()->disableLayout();

    }


}



