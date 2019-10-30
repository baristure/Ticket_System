<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Users extends CI_Controller { 

function __construct() { 
        parent::__construct(); 
        } 

public function index(){ 
                //Get all tickets from database
                $tickets = $this
                ->db
                ->get('users')
                ->result();
                
                $viewData = new stdClass();
                $viewData->tickets = $tickets;
                //Load view
                $this->load->view('elements/header');
                $this->load->view('users/main',$viewData);
                $this->load->view('elements/footer');

} 
public function index_closed_ticket(){ 
        //Get status=0 tickets from database
        $tickets = $this
        ->db
        ->where('status',0)
        ->get('users')
        ->result();
        $viewData = new stdClass();
        $viewData->tickets = $tickets;
        //Load view
        $this->load->view('elements/header');
        $this->load->view('users/main',$viewData);
        $this->load->view('elements/footer');

} 
public function index_active_ticket(){ 
        //Get status=0 tickets from database
        $tickets = $this
        ->db
        ->where('status',1)
        ->get('users')
        ->result();
        $viewData = new stdClass();
        $viewData->tickets = $tickets;
        //Load view
        $this->load->view('elements/header');
        $this->load->view('users/main',$viewData);
        $this->load->view('elements/footer');

} 
public function create_ticket(){
        $this->load->view('elements/header');
        $this->load->view('users/create');
        $this->load->view('elements/footer');

}
public function submit_ticket(){
        $username       = $this->input->post("username");
        $ticket_name    = $this->input->post("ticket_name");
        $ticket_body    = $this->input->post("ticket_body");
        // $ticket_file    = $this->input->post("ticket_file");
        $data_users     = array(
                "username"      => $username,
                "ticket_name"   => $ticket_name,
                "status"        => 1
                );
        //insert tickets to the database table("users")
        $insert_users   = $this->db->insert("users",$data_users);
        $last_id        = $this->db->insert_id();

        //File upload settings
        
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['allowed_types'] = '*';
        // $config['max_size']	= '100'; // max size in KB
        // $config['max_width']  = '1024'; //max resolution width
        // $config['max_height']  = '768'; //max resolution height

        // load CI libarary called upload
        $this->load->library("upload", $config);

        $data_tickets = array('upload_data' => $this->upload->data());
        $image = $_FILES['ticket_file']['name'];  //name must be userfile
        
        $this->upload->do_upload("ticket_file");
         // assign the data to an array 
        $data_tickets   = array(
                "username"      => $username,
                "ticket_name"   => $ticket_name,
                "ticket_body"   => $ticket_body,
                "ticket_file"   => $image,
                "user_id"       => $last_id
        );
        
        //insert tickets to the database table("tickets")
        $insert_tickets = $this->db->insert("tickets",$data_tickets);

        if($insert_users){
                if($insert_tickets){
                        redirect(base_url("users"));
                }
        }else{
                echo "Ticket submitting is failed!!";
        }

}
public function show_ticket($user_id){
        $tickets = $this->db->select('U.id,T.ticket_file,T.username,U.ticket_name,U.status,T.ticket_body')
        ->from('users as U')
        ->join('tickets as T','T.user_id=U.id')
        ->where('U.id',$user_id)
        ->get()
        ->result();
        $viewData = new stdClass();
        $viewData->tickets = $tickets;
        $this->load->view('elements/header');
        $this->load->view('users/show',$viewData);
        $this->load->view('elements/footer');
}
public function new_message($user_id){
        $tickets = $this->db->select('U.id,T.ticket_file,T.username,U.ticket_name,U.status,T.ticket_body')
        ->from('users as U')
        ->join('tickets as T','T.user_id=U.id')
        ->where('U.id',$user_id)
        ->get()
        ->result();
        $viewData = new stdClass();
        $viewData->tickets = $tickets;
        $this->load->view('elements/header');
        $this->load->view('users/message',$viewData);
        $this->load->view('elements/footer');

}
public function reply_ticket($user_id){
        $ticket = $this->db->select('*')
        ->from('users')
        ->where('id',$user_id)
        ->get()
        ->row();
        $ticket_body = $this->input->post("ticket_body");

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['allowed_types'] = '*';
        // $config['max_size']	= '100'; // max size in KB
        // $config['max_width']  = '1024'; //max resolution width
        // $config['max_height']  = '768'; //max resolution height

        // load CI libarary called upload
        $this->load->library("upload", $config);

        $data_tickets = array('upload_data' => $this->upload->data());
        $image = $_FILES['ticket_file']['name'];  //name must be userfile
        $this->upload->do_upload("ticket_file");
        // assign the data to an array 
        $data_tickets = array(
                "username"      => $ticket->username,
                "ticket_name"   => $ticket->ticket_name,
                "ticket_body"   => $ticket_body,
                "ticket_file"   => $image,
                "user_id"       => $user_id
                );        
        $insert = $this->db->insert("tickets",$data_tickets);

        if($insert){
                redirect(base_url("users/show_ticket/$user_id"));
        }else{
                echo "Ticket submitting is failed!!";
        }
}
public function search(){
        $key = $this->input->post('search_text');
        $data['tickets']=$this->Search_model->search($key);

                $this->load->view('elements/header');
                $this->load->view('users/main', $data);
                $this->load->view('elements/footer');
        }
}