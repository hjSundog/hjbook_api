<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic record interaction methods you could use
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
class records extends REST_Controller
{
    function __construct() {
       	parent::__construct();
       	header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Headers:*');
    }
    function index_get($id = '')
    {
    
        if (!$id) $id = 0;
        $query = $this->db->query('SELECT * FROM record');
        // Example data for testing.
        $record = $query->result();
         
        //if (!$record_id) { $record_id = $this->get('record_id'); }
        if (!$id)
            
            {
                //$record = $this->record_model->getrecord();                        
                if($record)
                    $this->response($record, 200); // 200 being the HTTP response code
                else
                    $this->response(array('error' => 'Couldn\'t find any record!'), 404);
            }
        
        //$record = $this->record_model->getrecord($id);
        
        if ($id)
            {
            $query = $this->db->query('SELECT * FROM record WHERE book_id = '.$id);

            $record = $query->result();
            if($record)
                $this->response($record, 200); // 200 being the HTTP response code
            else
                $this->response(array('error' => 'Book could not be found'), 404);
            } 
        if ($id == 0) $this->response(array('error' => 'Book could not be found'), 404);
        
    }
    
    /*
    function index_post() 
    {
        $headers = $this->input->request_headers();
        $token = $this->jwt->decode($headers['Access-Token'],'hjbook_key');
        $actual_user = $token->user_id;
        $query_user = $this->db->query('SELECT auth FROM user WHERE user_id ="'.$actual_user.'"');
        $user = $query_user->result();
        $auth = ($user[0]->{'auth'});
        if ($auth == "") $this->response(array('error' => 'Unauthorized'), 401);
        else
        {
            if (func_num_args() != 0) $this->response(array('error' => 'Cannot post with certain id'), 401);
            $data = $this->_post_args;
            try{
                $query = $this->db->query('INSERT INTO record (user_id, book_id, status, create_datetime) VALUES ("'.$data['user_id'].'", "'.$data['book_id'].'", 1, now())');
                } catch (Exception $e){
                    $this->response(array('error' => $e->getMessage()), $e->getCode());
                }
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
    */
    //NO POST AND PUT
    /*
    public function index_put($id = '')                                                         
    {
        $headers = $this->input->request_headers();
        $token = $this->jwt->decode($headers['Access-Token'],'hjbook_key');
        $actual_user = $token->user_id;
        $query_user = $this->db->query('SELECT auth FROM user WHERE user_id ="'.$actual_user.'"');
        $user = $query_user->result();
        $auth = ($user[0]->{'auth'});
        if ($auth == "") $this->response(array('error' => 'Unauthorized'), 401);
        else
        {
            $data = $this->_put_args;
            if ($id) 
            {
                if ($data['status'] === NULL) $this->response(array('error' => 'must input status'), 400);
                //false !=== NULL BUT false == NULL!!!!!!!!!!!!!!!!!!!!!!!!!!
                //默认修改时间就是最终归还时间，如果status为零的话
                $query = $this->db->query('UPDATE record SET status = "'.$data['status'].'" WHERE record_id = '.$id);
                if ($data['status'] == 0) 
                {
                $query = $this->db->query('UPDATE record SET return_datetime = now() WHERE record_id = '.$id);
                }
                $query = $this->db->query('SELECT * FROM record WHERE record_id = '.$id);
                $record = $query->result();
                if (!$record) $this->response(array('error' => 'Record could not be found'), 404);
                //$record = array('id' => $data['id'], 'name' => $data['name']); // test code
                //$record = $this->record_model->getrecord($id);
                $this->response($record, 200); // 200 being the HTTP response code
            } else
                $this->response(array('error' => 'Must enter an ID'), 400);
        }
    }
    */
    function index_delete($id = '')
    {
        $this->response(array('message' => 'Records Deletion is not Supported'), 400);
        /*
        $headers = $this->input->request_headers();
        $token = $this->jwt->decode($headers['Access-Token'],'hjbook_key');
        $actual_user = $token->user_id;
        $query_user = $this->db->query('SELECT auth FROM user WHERE user_id ="'.$actual_user.'"');
        $user = $query_user->result();
        $auth = ($user[0]->{'auth'});
        if ($auth != "administrator") $this->response(array('error' => 'Unauthorized'), 401);
        else
        {
            if (!$id) { $id = $this->get('id'); }
            if (!$id)
            {
                $this->response(array('error' => 'An ID must be supplied to delete a record'), 400);
            }
            $query = $this->db->query('SELECT * FROM record WHERE record_id = '.$id);
            $record = $query->result();
            if(!$record) $this->response(array('error' => 'Record could not be found'), 404);
            if($record)
            {
                $query = $this->db->query('DELETE FROM record WHERE record_id ='.$id);
                $this->response(array('message' => 'Delete OK!'), 200);
            }
        }
        */
    }
    
}
