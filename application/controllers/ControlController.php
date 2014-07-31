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
        echo $user->sitename;
        echo date("d-m-Y", $user->date)."<br>";
        echo $user->password;
        echo $user->email;
    }

    public function mainAction()
    {


    }

}



