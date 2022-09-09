<?php
/**
 * Welcome page
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
require '../../vendor/autoload.php';
$db = new \Employee\Employee\Config\Db();
$conn = $db->getConnection();
$dashboardM = new \Employee\Employee\Model\Dashboard($conn);
$dashboardC = new
 Employee\Employee\Controller\Dashboard($dashboardM);
$homeController = new Employee\Employee\Controller\Home();
$homeController->getHome();
$dashboardC->getEmployee();
