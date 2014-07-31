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

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $sitename = $form->getValue('sitename');
                $email = $form->getValue('email');
                $password = $form->getValue('password');

                $user = new Application_Model_DbTable_Users();
                $user->addUser($sitename, md5($password), $email);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function siteAction()
    {
        $this->_helper->layout()->disableLayout();

    }


}



