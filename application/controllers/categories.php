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
class categories extends REST_Controller
{
    function index_get($category = "")
    {
        //echo "${category} fuck";
        if (!$category)
            
            {
                $query = $this->db->query('SELECT * FROM category');
                $category = $query->result();
                $this->response($category, 200);
            }
        if ($category)
            {
            $query = $this->db->query('SELECT * FROM book WHERE book_category ="'.$category.'"');

            $book = $query->result();
            if($book)
                $this->response($book, 200); // 200 being the HTTP response code
            else
                $this->response(array('error' => 'category could not be found'), 404);
            } 
    }
}