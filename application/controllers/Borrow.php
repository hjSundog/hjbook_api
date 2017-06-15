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
class borrow extends REST_Controller
{
    function __construct() {
       	parent::__construct();
       	header('Access-Control-Allow-Origin:*');
    }
    function index_post($id = '')
    {
    	$headers = $this->input->request_headers();
        $token = $this->jwt->decode($headers['Access-Token'],'hjbook_key');
        $actual_user = $token->user_id;
        $query2 = $this->db->query('SELECT borrowed FROM book WHERE book_id ='.$id);
        $book = $query2->result();
        $borrowed = ($book[0]->{'borrowed'});
        if ($borrowed == '1') $this->response(array('error' => 'The book is already borrowed'), 400);
        $query1 = $this->db->query('UPDATE book SET borrowed = true WHERE book_id = '.$id);
        $query = $this->db->query('INSERT INTO record (user_id, book_id, status, create_datetime) VALUES ("'.$actual_user.'", "'.$id.'", 1, now())');
        $new = $this->db->query('SELECT @@identity');
            $result = $new->result();
            //$this->response($result, 200);
            $new_id = ($result[0]->{'@@identity'});
            $query = $this->db->query('SELECT * FROM record WHERE record_id = '.$new_id);
            $record = $query->result();
                if($record)
                    $this->response($record, 200); // 200 being the HTTP response code
            
    }
}
