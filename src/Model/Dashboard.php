<?php
/**
 * DashboardModel that controls  database related function.
 *
 * PHP version 8.1.3
 *
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
namespace Employee\Employee\Model;

/**
 * DashboardModel class handle Dashboard method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class Dashboard
{
    private $_conn;

    /**
     * Constructor for the Dashboard Model.
     *
     * @param $conn is the object for database connection.
     */
    public function __construct($conn)
    {
        $this->_conn = $conn;
    }

    /**
     * Function to get accecss to system.
     *
     * @param $userName is useremail.
     * @param $userPass  is user password.
     *
     * @return mixed return $result or false containts.
     */
    public function getLogin(string $userName, string $userPass): mixed
    {
        $sql = "select * from `user_type` where user_name = ? and user_password = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("ss", $userName, $userPass);
        $stmt->execute();
        $res= $stmt->get_result();
        if ($res->num_rows > 0) {
            $result = array();
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($result, $row);
            }
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Dashoard function returns the list of all employee
     * 
     * @return array list of employee
     */
    public function getEmployee(): array
    {  
        $sql = "select * from `employee`";
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->get_result();
        $count = $res->num_rows;
        if ($count > 0) { 
            $result = array();
            while ($row = mysqli_fetch_assoc($res)) {
                array_push($result, $row);
            }
            return $result;
        }  
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
      * @return bool return nothing.
      */
    public function getUpdate(int $empId, string $empRegNo,
     string $empName, string  $empDeg,
        string $empEmail, string $empPhone, string $empDate
    ):bool {
        $sql = "UPDATE employee
        SET  RegNo = ?, Emp_name = ?, Designation = ?, Email = ?, Phone_no = ?, Birth_date = ?
          WHERE EmpId = ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param(
            "ssssssi", $empRegNo, $empName, $empDeg, $empEmail, $empPhone, $empDate, $empId
        );
        $res = $stmt->execute();
        if ($res) {   
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function to delete user from system.
     * 
     * @param $empId is user id.
     * 
     * @return bool return true or false.
     */
    public function getDelete(int $empId): bool
    {
        $sql = "delete from `employee` where EmpId= ?";
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param("i", $empId);
        $res = $stmt->execute();
        if ($res) {   
            return true;
        } else {
            return false;
        }
    }

    /**
     * function is add new employee
     * 
     * @param $regno registration number
     * @param $name  name of employee
     * @param $deg   is designation
     * @param $email is email
     * @param $phone is phone number
     * @param $date1  is birth date
     * 
     * @return int last insert idex
     */
    public function getAddNew(string $regno, string $name,
     string $deg, string $email, string $phone, string $date1): int
    {
        $sql = 'INSERT INTO employee
         (`RegNo`,Emp_name,`Designation`,Email,`Phone_no`,Birth_date)
         values (?, ?, ?, ?, ?,?)';
        $stmt = $this->_conn->prepare($sql);
        $stmt->bind_param(
            "ssssss",
            $regno, $name, $deg, $email, $phone, $date1
        );
        $stmt->execute();
        // $res =$stmt->insert_id;
        $id = mysqli_insert_id($this->_conn);
        if ($id > 0) {
            return $id ;
        } 
    }
}

    

