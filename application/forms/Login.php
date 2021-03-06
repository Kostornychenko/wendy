<?php

class Application_Form_Login extends Zend_Form
{
    public function init()
    {
        $this->setName('login');

        $isEmptyMessage = 'Значение является обязательным и не может быть пустым';

        $sitename = new Zend_Form_Element_Text('sitename');
        $sitename->setLabel("Логін:")
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setAttrib('class', 'form-control')
            ->setAttrib('placeholder', 'sitename')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Пароль:')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setAttrib('class', 'form-control')
            ->setAttrib('placeholder', 'password')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $submit = new Zend_Form_Element_Submit('login');
        $submit->setLabel('Увійти')
            ->setAttrib('class', 'btn btn-primary');

        $this->addElements(array($sitename, $password, $submit));
        $this->setMethod('post');
    }
}
