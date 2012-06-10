<?php
require_once $_SESSION['CLASS'] . 'User.php';
require_once $_SESSION['CLASS'] . 'UserAdmin.php';
require_once $_SESSION['CLASS'] . 'UserGeneric.php';

class ProxyUser
        extends User
{

    public $typeUser;

    public function __construct($typeUser, $code = null, $name = null, $lastName = null, $date = null)
    {
        $this->setCode($code);
        $this->setName($name);
        $this->setLastName($lastName);
        $this->setdate($date);
        $this->typeUser = $typeUser;
    }
    
    public function save($codOrLevel)
    {
        if ($this->typeUser == 1)
        {
            $userAdmin = new UserAdmin(
                            $this->getCode(),
                            $this->getName(),
                            $this->getLastName(),
                            $this->getdate(),
                            $codOrLevel);
//            var_dump($userAdmin);
//            exit;
            return $userAdmin->saveUser();
        } else
        {
            $userGeneric = new UserGeneric(
                            $this->getCode(),
                            $this->getName(),
                            $this->getLastName(),
                            $this->getdate(),
                            $codOrLevel);
            return $userGeneric->saveUser();
        }
    }

    public function fetchAll()
    {        
        if($this->typeUser == 1)
        {
            $userAdmin = new UserAdmin();
            $allUserAdmin = $userAdmin->fetchAll();
            return $allUserAdmin;
        }else{
            $userGeneric = new UserGeneric();
            $allUserGeneric = $userGeneric->fetchAll();
            return $allUserGeneric;
        }
    }
    
    public function saveUser()
    {
        
    }

}
