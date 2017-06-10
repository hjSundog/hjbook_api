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
class books extends REST_Controller
{
    function index_get($id = '')
    {
        $query = $this->db->query('SELECT * FROM book');
        // Example data for testing.
        $book = $query->result();
         
        //if (!$book_id) { $book_id = $this->get('book_id'); }
        if (!$id)
            
            {
                //$book = $this->book_model->getbook();                        
                if($book)
                    $this->response($book, 200); // 200 being the HTTP response code
                else
                    $this->response(array('error' => 'Couldn\'t find any book!'), 404);
            }
        
        //$book = $this->book_model->getbook($id);
        
        if ($id)
            {
            $query = $this->db->query('SELECT * FROM book WHERE book_id = '.$id);

            $book = $query->result();
            if($book)
                $this->response($book, 200); // 200 being the HTTP response code
            else
                $this->response(array('error' => 'book could not be found'), 404);
            } 
        if ($id == 0) $this->response(array('error' => 'book could not be found'), 404);
    }
    
    function index_post() 
    {
        if (func_num_args() != 0) $this->response(array('error' => 'cannot post with certain id'), 400);
        $data = $this->_post_args;
        $query1 = $this->db->query('SELECT * FROM category WHERE category_name ="'.$data['book_category'].'"');
        $category = $query1->result();
        if (!$category) $query1 = $this->db->query('INSERT INTO category (category_name) VALUES ("'.$data['book_category'].'")');
        try{
            $query = $this->db->query('INSERT INTO book (book_name, book_category, book_detail, borrowed, create_datetime) VALUES ("'.$data['book_name'].'", "'.$data['book_category'].'", "'.$data['book_detail'].'", false, now());');
            } catch (Exception $e){
                $this->response(array('error' => $e->getMessage()), $e->getCode());
            }
        $new = $this->db->query('SELECT @@identity');
        $result = $new->result();
        //$this->response($result, 200);
        $new_id = ($result[0]->{'@@identity'});
        $query = $this->db->query('SELECT * FROM book WHERE book_id = '.$new_id);
        $book = $query->result();
            if($book)
                $this->response($book, 200); // 200 being the HTTP response code
        
        
        
        /*
        try {
            //$id = $this->book_model->createbook($data);
            $id = 3; // test code
            //throw new Exception('Invalid request data', 400); // test code
            //throw new Exception('book already exists', 409); // test code
        } catch (Exception $e) {
            // Here the model can throw exceptions like the following:
            // * For invalid input data: new Exception('Invalid request data', 400)
            // * For a conflict when attempting to create, like a resubmit: new Exception('book already exists', 409)
            $this->response(array('error' => $e->getMessage()), $e->getCode());
        }
        if ($id) {
            $book = array('id' => $id, 'name' => $data['name']); // test code
            //$book = $this->book_model->getbook($id);
            $this->response($book, 201); // 201 being the HTTP response code
        } else
            $this->response(array('error' => 'book could not be created'), 404);
        */
    }
    
    public function index_put($id = '')                                                         
    {
        $data = $this->_put_args;
        if ($id) {
            //存在问题 之前两个都可以为空的
            //由于category和book表独立，所以尽量在put的时候不要动category的内容，毕竟常理上说一本书定了它的category已经定了

            $query = $this->db->query('UPDATE book SET book_name = "'.$data['book_name'].'",book_category = "'.$data['book_category'].'", book_detail = "'.$data['book_detail'].'", borrowed = "'.$data['borrowed'].'" WHERE book_id = '.$id);
            $query = $this->db->query('SELECT * FROM book WHERE book_id = '.$id);
            $book = $query->result();
            //$book = array('id' => $data['id'], 'name' => $data['name']); // test code
            //$book = $this->book_model->getbook($id);
            
            $this->response($book, 200); // 200 being the HTTP response code
        } else
            $this->response(array('error' => 'book could not be found'), 404);
        
    }
        
    function index_delete($id = '')
    {
        if (!$id) { $id = $this->get('id'); }
        if (!$id)
        {
            $this->response(array('error' => 'An ID must be supplied to delete a book'), 400);
        }

        $query = $this->db->query('DELETE FROM book WHERE book_id ='.$id);
        

        if($query) {
            $this->response(array('message' => 'Delete OK!'), 200);
        } else
            $this->response(array('error' => 'book could not be found'), 404);
    }
}