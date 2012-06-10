<?php
require_once $_SESSION['CLASS'] . 'User.php';
require_once $_SESSION['CLASS'] . 'Connection.php';

class UserGeneric
        extends User
{

    private $levelUser;

    public function __construct($code = null, $name = null, $lastName = null, $date = null, $levelUser = null)
    {
        $this->setCode($code);
        $this->setName($name);
        $this->setLastName($lastName);
        $this->setdate($date);
        $this->levelUser = $levelUser;
    }

    protected function saveUser()
    {
        $queryUser = "insert into user (code, name, lastName, date) values(
                    '{$this->getCode()}',
                    '{$this->getName()}',
                    '{$this->getLastName()}',
                    '{$this->getdate()}');";


        $resultUser = Connection::executeQuery($queryUser);

        $idUser = Connection::fetchRow("Select idUser from user where code='{$this->getCode()}' ");

        $queryUserGeneric = "insert into usergeneric (level, User_idUser) values(
                    {$this->getLevelUser()},
                    '{$idUser[0]}')";

        $resultUserGeneric = Connection::executeQuery($queryUserGeneric);

        if ($resultUser && $resultUserGeneric)
            return true;
        else
            return false;
    }

    protected function fetchAll()
    {
        $query = "SELECT * FROM user u, usergeneric ug WHERE u.idUser = ug.User_idUser";
        $result = Connection::fetchAll($query);
        return $result;
    }

    function getLevelUser()
    {
        return $this->levelUser;
    }

}