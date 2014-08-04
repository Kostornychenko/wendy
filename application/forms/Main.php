<?php

class Application_Form_Main extends Zend_Form
{
    public function init()
    {
        $this->setName('main');

        $isEmptyMessage = 'Значение является обязательным и не может быть пустым';

        $he_name = new Zend_Form_Element_Text('he_name');
        $he_name->setLabel("Наречений:")
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setAttrib('class', 'form-control')
            ->setAttrib('placeholder', "Ім'я")
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $she_name = new Zend_Form_Element_Text('she_name');
        $she_name->setLabel("Наречена:")
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->setAttrib('class', 'form-control')
            ->setAttrib('placeholder', "Ім'я")
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );


        $submit = new Zend_Form_Element_Submit('save');
        $submit->setLabel('Зберегти')
            ->setAttrib('class', 'btn btn-primary');

        $this->addElements(array($he_name, $she_name, $submit));
        $this->setMethod('post');
    }
}
