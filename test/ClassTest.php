<?php

class ClassTest
{
    private $name;
    private $lastName;

    public function __construct($firstName, $lastName = 'Иванов')
    {
        $this->setName($firstName);
        $this->lastName = $lastName;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getMiniName($count)
    {
        return mb_substr($this->name, 0, $count);
    }
}