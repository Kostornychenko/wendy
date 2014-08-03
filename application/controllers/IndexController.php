<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction() {
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
                $site = new Application_Model_DbTable_Sites();
                $site->addSite($sitename);
                $data = array(
                    'complete' => 1,
                    'sitename' => $sitename
                );
                $this->view->data = $data;
            } else {
                $form->populate($formData);
            }
        }
    }

    public function siteAction() {
        $this->_helper->layout()->disableLayout();

        $sitename = $this->_getParam('sitename');
        $data = new Application_Model_DbTable_Sites();
        $result = $data->getSite($sitename);
        $user = Zend_Auth::getInstance()->getIdentity();
        if ($result) {
            if ($result['publish'] == 0) {
                $this->view->nomoney = true;
            } else {
                $this->view->data = $result;
            }
        } else {
            throw new Zend_Controller_Dispatcher_Exception('Сторінки немає', 404);
        }
    }


}



