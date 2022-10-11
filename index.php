<?php
/**
 * Index page that controls login.
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
require 'vendor/autoload.php';
$homeController = new Employee\Employee\Controller\Home();
if (isset($_SESSION['userName'])) {
    header("location:src/View/welcome.php");
}
if (!isset($_SESSION['userName'])) {
    $session = null;
    $homeController->getHome($session);
}
if (isset($_GET['fail']) && $_GET['fail'] == 'failed') {
    echo '<div id="msge"><span>Invalid credentials !!</span>
    <button id="btn3">x</button></div>';     
} 
if (!isset($_SESSION['userName'])) {
    $homeController->getSignin();
}
if (isset($_SESSION['userName'])) {
    header('location:src/view/welcome.php');
}

sdfdsfd