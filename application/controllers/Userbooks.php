<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package CodeIgniter
 * @subpackage  Rest Server
 * @category    Controller
 * @author  Adam Whitney
 * @link    http://outergalactic.org/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';
class userbooks extends REST_Controller
{
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin:*');
    }
    function index_get($id = '')
    {
        $result = array();
        $query = $this->db->query('SELECT * FROM book WHERE current_borrower = '.$id);
        $book = $query->result();
        if($book)
            $this->response($book, 200);
        else $this->response(array('error' => 'No borrowed books'), 404);
    }
}
