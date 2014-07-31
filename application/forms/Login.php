<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setName('login');

        $isEmptyMessage = 'Значение является обязательным и не может быть пустым';

        $sitename = new Zend_Form_Element_Text('sitename');
        $sitename->setLabel('Sitename:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('password:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $submit = new Zend_Form_Element_Submit('login');
        $submit->setLabel('enter');

        $this->addElements(array($sitename, $password, $submit));
        $this->setMethod('post');
    }
}
