<?php

abstract class User
{

    private $code;
    private $name;
    private $lastName;
    private $date;

    public function __construct($code, $name, $lastName, $date)
    {
        $this->code = $code;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->date = $date;
    }

    abstract protected function saveUser();
    abstract protected function fetchAll();

    function getCode()
    {
        return $this->code;
    }

    function setCode($code)
    {
        return $this->code = $code;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        return $this->name = $name;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function setLastName($lastName)
    {
        return $this->lastName = $lastName;
    }

    function getdate()
    {
        return $this->date;
    }

    function setdate($date)
    {
        return $this->date = $date;
    }
}