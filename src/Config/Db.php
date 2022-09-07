<?php
/**
 * Db that controls database connectivity.
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
namespace Employee\Employee\Config;

/**
 * Db class handle Database method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class Db
{
    private $_conn;
 
    /**
     * Constructor for the database connection.
     */
    public function __construct()
    {      
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $database= "dbemployee";   
        $this->_conn = mysqli_connect($serverName, $userName, $password, $database);
    }

    /**
     * Function to get connectionto database.
     * 
     * @return object return $conn database object.
     */
    public function getConnection(): object
    {
        return $this->_conn;
    }
}
?>
