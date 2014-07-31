<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    public function addUser($sitename, $password, $email) {
        $date = time();
        $data = array(
            'sitename' => $sitename,
            'password' => $password,
            'email' => $email,
            'publish' => 0,
            'role' => 'user',
            'date' => $date
        );
        $this->insert($data);
    }
}

