<?php
/**
 * DashboardController that controls all the User related functionality
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
namespace Employee\Employee\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Dashboard Controller class handle Dashboard method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class DashboardController
{
    private $_loader;
    private $_twig;
    public $res;
    public $dashboardModel;
    public $result;

    /**
     * Constructor for the User controller.
     *
     * @param $dashboardModel is the object for user model.
     */
    public function __construct($dashboardModel)
    {
        $this->_loader = new FilesystemLoader(__DIR__.'/../View/Templates');
        $this->_twig = new Environment($this->_loader);
        $this->dashboardModel = $dashboardModel;
    }


    /**
     * Function to get accecss to system.
     *
     * @param $userName is useremail.
     * @param $userPass is user password.
     *
     * @return void return nothing.
     */
    public function loginController(string $userName,string $userPass)
    {   
        // session_start();
        $this->result = $this->dashboardModel->loginModel($userName, $userPass);
        if ($this->result != false) {
            $arr = $this->result;
            // $_SESSION['userName'] = $arr[0]['user_name']; 
            header('location:welcome.php');
        } else {
            // $_SESSION['fail'] = 'failed';
            header('location:../../index.php');
        }
    }
    
    /**
     * Dashoard function returns the list of all employee
     * 
     * @return void list of employee
     */
    public function dashboard()
    {
        $result = $this->dashboardModel->dashboard();
        echo $this->_twig->render('welcome.html.twig', ['empall'=>$result]);
    }
    /**
     * Function to update the employee details.
     *
     * @param $empId    is id of employee.
     * @param $empRegNo is reg no.
     * @param $empName  is name.
     * @param $empDeg   is emp designation.
     * @param $empEmail is email.
     * @param $empPhone is phone.
     * @param $empDate  is date of birth.
     * 
     * @return void return nothing.
     */
    public function updateController(
        $empId, $empRegNo, $empName, $empDeg,
        $empEmail, $empPhone, $empDate
    ) {
        $result = $this->dashboardModel->updateModel(
            $empId, $empRegNo, $empName, $empDeg,
            $empEmail, $empPhone, $empDate
        );
        echo $result;
    }
      /**
       * Function to delete employee from system.
       * 
       * @param $empId is user id.
       * 
       * @return void return true or false.
       */
    public function deleteController($empId)
    {
        $result = $this->dashboardModel->deleteModel($empId);
        echo $result;  
    }
    /**
     * Function is add new employee
     * 
     * @param $regno registration number
     * @param $name  name of employee
     * @param $deg   is designation
     * @param $email is email
     * @param $phone is phone number
     * @param $date1 is birth date
     * 
     * @return int last insert idex
     */
    public function addnewController($regno, $name,
        $deg, $email, $phone, $date1
    ): int {
        $result = $this->dashboardModel->addnewModel(
            $regno, $name,
            $deg, $email, $phone, $date1
        );
        return $result;
    }
}
