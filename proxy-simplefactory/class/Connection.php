<?php
require_once $_SESSION['HOME'] . '/includes/config.php';

class Connection
{

    static $conexion;

    public static function connect()
    {
        self::$conexion = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        mysql_select_db(DB_NAME, self::$conexion);
    }

    public static function fetchAll($query)
    {
        self::connect();
        $result = mysql_query($query, self::$conexion);
        $count = 0;
        $finalResult;
        
        while ($tempArray = mysql_fetch_array($result))
        {
            $finalResult[$count] = $tempArray;
            $count++;
        }
        
        return $finalResult;
    }

    public static function fetchRow($query)
    {
        self::connect();
        $result = mysql_query($query, self::$conexion);
        return mysql_fetch_row($result);
    }

    public static function executeQuery($query)
    {
        self::connect();
        $result = mysql_query($query, self::$conexion);

        if (!$result)
        {
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }

        return $result;
    }

}
