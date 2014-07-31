<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    public function addUser($sitename, $password, $email) {
        $data = array(
            'sitename' => $sitename,
            'password' => $password,
            'email' => $email
        );
        $this->insert($data);
    }
}

