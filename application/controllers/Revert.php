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
class revert extends REST_Controller
{
	function index_post($id = '')
    {
        $headers = $this->input->request_headers();
        $token = $this->jwt->decode($headers['access_token'],'hjbook_key');
        $actual_user = $token->user_id;
        $query = $this->db->query('INSERT INTO record (user_id, book_id, status, return_datetime) VALUES ("'.$actual_user.'", "'.$id.'", 1, now())');
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