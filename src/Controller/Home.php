<?php
/**
 * HomeController that controls all the Index related functionality
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
 * Home Controller class handle Dashboard method
 * 
 * @category Asnt
 * @package  Asnt-twig
 * @author   Original Author <chaudharymilan996@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
class Home
{
    private $_loader;
    private $_twig;

    /**
     * Constructor for the Home controller.
     */
    public function __construct()
    {
        $this->_loader = new FilesystemLoader(__DIR__.'/../View/Templates');
        $this->_twig = new Environment($this->_loader);
    }

    /**
     * Function to rendor of index.
     * 
     * @param $session
     * 
     * @return void return singini modal.
     */
    public function getHome($session):void
    {
        echo $this->_twig->render('index.html.twig',['session'=>$session]);    
    }
    /**
     * Function to rendor of signin twig file.
     * 
     * @return void  sign twig file.
     */
    public function getSignin():void
    {
        echo $this->_twig->render('signin.html.twig');
    }
}
?>
