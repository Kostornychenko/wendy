<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        $this->setName('register');

        $isEmptyMessage = 'Значение является обязательным и не может быть пустым';

        $sitename = new Zend_Form_Element_Text("sitename");
        $sitename->setLabel('Sitename:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $email = new Zend_Form_Element_Text("email");
        $email->setLabel('Email:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $password = new Zend_Form_Element_Text("password");
        $password->setLabel('Password:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $submit = new Zend_Form_Element_Submit('register');
        $submit->setLabel('Register');

        $this->addElements(array($sitename, $email, $password, $submit));

        $this->setMethod('post');
    }


}

