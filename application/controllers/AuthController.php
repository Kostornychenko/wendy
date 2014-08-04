<?php

class AuthController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->_helper->redirector('login');
    }

    public function loginAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->redirector('index', 'index');
        }

        $form = new Application_Form_Login();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
                $authAdapter->setTableName('users')
                    ->setIdentityColumn('sitename')
                    ->setCredentialColumn('password');

                $sitename = $this->getRequest()->getPost('sitename');
                $password = $this->getRequest()->getPost('password');

                $authAdapter->setIdentity($sitename)
                    ->setCredential(md5($password));
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    $identity = $authAdapter->getResultRowObject();
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    $user = Zend_Auth::getInstance()->getIdentity();
                    if ($user->role == 'user') {
                        $this->_helper->redirector('index', 'admin');
                    }
                } else {
                    $this->view->errMessage = 'Вы ввели неверное имя пользователя или неверный пароль';
                }
            }
        }
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }
}