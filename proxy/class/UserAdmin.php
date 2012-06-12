<?php
require_once $_SESSION['CLASS'] . 'User.php';
require_once $_SESSION['CLASS'] . 'Connection.php';

class UserAdmin
        extends User
{

    private $codeAdmin;

    public function __construct($code = null, $name = null, $lastName = null, $date = null, $codeAdmin = null)
    {
        $this->setCode($code);
        $this->setName($name);
        $this->setLastName($lastName);
        $this->setdate($date);
        $this->codeAdmin = $codeAdmin;
    }

    protected function saveUser($codOrLevel)
    {
        $queryUser = "insert into user (code, name, lastName, date) values(
                    '{$this->getCode()}',
                    '{$this->getName()}',
                    '{$this->getLastName()}',
                    '{$this->getdate()}');";


        $resultUser = Connection::executeQuery($queryUser);

        $idUser = Connection::fetchRow("Select idUser from user where code='{$this->getCode()}' ");

        $queryUserAdmin = "insert into useradmin (codeAdmin, User_idUser) values(
                    '{$this->getCodeAdmin()}',
                    '{$idUser[0]}')";

        $resultUserAdmin = Connection::executeQuery($queryUserAdmin);

        if ($resultUser && $resultUserAdmin)
            return true;
        else
            return false;
    }

    protected function fetchAll()
    {
        $query = "SELECT * FROM user u, useradmin ua WHERE u.idUser = ua.User_idUser";
        $result = Connection::fetchAll($query);
        return $result;
    }

    function getCodeAdmin()
    {
        return $this->codeAdmin;
    }

}