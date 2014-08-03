<?php

class Application_Model_DbTable_Sites extends Zend_Db_Table_Abstract
{

    protected $_name = 'sites';

    public function getSite($sitename) {
        $row = $this->fetchRow('sitename = "'.$sitename.'"');
        if(!$row) { return false; }
        return $row->toArray();
    }

    public function addSite($sitename) {
        $data = array(
            'sitename' => $sitename
        );
        $this->insert($data);
    }

}

