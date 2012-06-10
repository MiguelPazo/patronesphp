<?php
require_once $_SESSION['CLASS'] . 'ProxyUser.php';

$mensaje;
$listUsers;
$labelVal = 'Admin Code';

if (isset($_POST['oper']))
{
    switch ($_POST['oper'])
    {
        case '1':
            $proxyUser = new ProxyUser(
                            1,
                            $_POST['code'],
                            $_POST['name'],
                            $_POST['lastName'],
                            date('Y-m-d'));
            
            if ($proxyUser->save($_POST['codeAdmin']))
                $mensaje = 'New administrator successfully registered';
            else
                $mensaje = 'Error';
            break;

        case '2':
            $proxyUser = new ProxyUser(
                            2,
                            $_POST['code'],
                            $_POST['name'],
                            $_POST['lastName'],
                            date('Y-m-d'));
            
            if ($proxyUser->save($_POST['levelAccount']))
                $mensaje = 'New generic user successfully registered';
            else
                $mensaje = 'Error';
            break;

        case 'listAdmin':
            $proxyUser = new ProxyUser(1);
            $listUsers = $proxyUser->fetchAll();
            $labelVal = 'Admin Code';
            break;
        case 'listGeneric';
            $proxyUser = new ProxyUser(2);
            $listUsers = $proxyUser->fetchAll();
            $labelVal = 'Level User';
            break;
    }
}
    