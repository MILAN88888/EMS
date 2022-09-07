<?php
/**
 * Action that controls all the User related functionality
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

$db = new Employee\Employee\Config\Db();
$conn = $db->getConnection();

$dashboardModel = new Employee\Employee\Model\DashboardModel($conn);
$dashboardController = new 
Employee\Employee\Controller\DashboardController($dashboardModel);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $userName = $_POST['userName'];
        $userPass = $_POST['userPass'];
        $dashboardController->loginController($userName, $userPass);
    }
}

if (isset($_GET['type']) && $_GET['type'] == 'Update') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       
            $empId = $_POST['empid'];
            $empRegNo = $_POST['regno'];
            $empName = $_POST['empname'];
            $empEmail = $_POST['empemail'];
            $empDeg = $_POST['empdeg'];
            $empPhone = $_POST['empphone'];
            $empDate = $_POST['empdate'];
            $dashboardController->updateController(
                $empId, $empRegNo, $empName, $empDeg,
                $empEmail, $empPhone, $empDate
            );
        
    }
}
if (isset($_GET['type']) && $_GET['type'] == 'Delete') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $empId = $_POST['id'];
        $dashboardController->deleteController($empId);    
    
    }
    
}
if (isset($_GET['type']) && $_GET['type'] == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $regno = $_POST['regno'];
        $name = $_POST['name'];
        $deg = $_POST['deg'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date1 = $_POST['date1'];
        $result = $dashboardController->addnewController(
            $regno,
            $name, $deg, $email, $phone, $date1
        );
        print_r($result); 
        die();   
        
    }
    
}
?>