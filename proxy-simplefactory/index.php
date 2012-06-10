<?php
require_once 'configSpace.php';
require_once 'Operations.php';
//require_once $_SESSION['CLASS'] . 'ProxyUser.php';

//$proxyUser = new ProxyUser(
//                1,
//                '1233',
//                'Andrea',
//                'Pazo',
//                '2012-10-12');
//if ($proxyUser->saveUser('4567'))
//    $mensaje = 'New administrator successfully registered';
//else
//    $mensaje = 'Error';
//echo $mensaje;
//exit;
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >

        <title>Example Patron Proxy - Simple Factory</title>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <script type="text/javascript" src="js/jquery-1.7.1.js" ></script>
        <script type="text/javascript" src="js/bootstrap-tab.js" ></script>
    </head>
    <body>
        <div class="container">
            <h2>NUEVO USUARIO</h2>
            <br/>           

            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#admin" data-toggle="tab">Administrator</a></li>
                <li class=""><a href="#generic" data-toggle="tab">Generic</a></li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="admin">
                    <?php
                    if ($mensaje != '')
                        echo "<span class='label label-info'>{$mensaje}</span>";
                    ?>
                    <form class="well" method="post">
                        <label>Code:</label>
                        <input name="code" type="text" class="span3" value="<?php echo substr(time(), 5) ?>" readonly="readonly" />
                        <label>Name:</label>
                        <input name="name" type="text" class="span3" placeholder="Type something…"/>
                        <label>Last Name:</label>
                        <input name="lastName" type="text" class="span3" placeholder="Type something…"/>
                        <label>Admin Code:</label>
                        <input name="codeAdmin" type="text" class="span3" value="<?php echo substr(time(), 1, 4) ?>" readonly="readonly" />
                        <br/>
                        <input type="hidden" value="1" name="oper" />
                        <button type="submit" class="btn">Save</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="generic">
                    <form class="well" method="post">
                        <label>Code:</label>
                        <input name="code" type="text" class="span3" value="<?php echo substr(time(), 5) ?>" readonly="readonly" />
                        <label>Name:</label>
                        <input name="name" type="text" class="span3" placeholder="Type something…"/>
                        <label>Last Name:</label>
                        <input name="lastName" type="text" class="span3" placeholder="Type something…"/>
                        <label>Level Account:</label>
                        <input name="levelAccount" type="text" class="span3" value="<?php echo substr(time(), 6, 5) ?>" readonly="readonly"/>
                        <br/>
                        <input type="hidden" value="2" name="oper"/>
                        <button type="submit" class="btn">Save</button>
                    </form>
                </div>
            </div>

            <br/>
            <br/>

            <form method="post">
                <button type="submit" class="btn btn-primary" href="#">List All Admin User</button>
                <input type="hidden" value="listAdmin" name="oper" />
            </form>

            <form method="post">
                <button type="submit" class="btn btn-primary" href="#">List All Generic User</button>
                <input type="hidden" value="listGeneric" name="oper" />
            </form>

            <div class="span8 allAdmin">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Code User</th>
                            <th>Date</th>
                            <th><?php echo $labelVal ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        if (isset($_POST['oper']) && $listUsers != null):
                            foreach ($listUsers as $collection => $value):
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo $value['lastName'] ?></td>
                                    <td><?php echo $value['code'] ?></td>
                                    <td><?php echo $value['date'] ?></td>
                                    <?php if ($_POST['oper'] == 'listGeneric'): ?>
                                        <td><?php echo $value['level'] ?></td>
                                    <?php else: ?>
                                        <td><?php echo $value['codeAdmin'] ?></td>
                                    <?php endif; ?>
                                </tr>

                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </body>
</html>
