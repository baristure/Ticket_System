<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Admin extends CI_Controller { 

function __construct() { 
    parent::__construct(); 
} 

public function index(){ 

    //Get all tickets from database
    $tickets = $this->db->get('users')->result();
    $viewData = new stdClass();
    $viewData->tickets = $tickets;

    //Load view
    $this->load->view('elements/header');
    $this->load->view('admin/main',$viewData);
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
    $this->load->view('admin/main',$viewData);
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
    $this->load->view('admin/main',$viewData);
    $this->load->view('elements/footer');

} 
public function edit_ticket($user_id){
    //Select last ticket
    $tickets = $this
    ->db
    ->select('U.id,T.ticket_file,T.username,U.ticket_name,U.status,T.ticket_body')
    ->from('users as U')
    ->join('tickets as T','T.user_id=U.id')
    ->where('U.id',$user_id)
    ->get()
    ->result();
    $viewData = new stdClass();
    $viewData->tickets = $tickets;
    //Load view
    $this->load->view('elements/header');
    $this->load->view('admin/edit',$viewData);
    $this->load->view('elements/footer');

}
public function update_ticket($user_id){
    //Update last ticket
    $ticket_body = $this->input->post("ticket_body");
    $data_tickets = array(
                "ticket_body"   => $ticket_body,
                );        
    $update = $this->db->update("tickets",$data_tickets);

    if($update){
        redirect(base_url("admin/show_ticket/$user_id"));
    }else{
        echo "Ticket updating is failed!!";
    }
}
public function close_ticket($user_id){
    $data['status'] = 0;
    $update = $this->db->where('id', $user_id)->update('users',$data);
    if($update){
        redirect(base_url("admin"));
    }
}
public function show_ticket($user_id){
    //Show Tickets
    $tickets = $this
    ->db
    ->select('U.id,T.ticket_file,T.username,U.ticket_name,U.status,T.ticket_body')
    ->from('users as U')
    ->join('tickets as T','T.user_id=U.id')
    ->where('U.id',$user_id)
    ->get()
    ->result();
    $viewData = new stdClass();
    $viewData->tickets = $tickets;
    //Load view
    $this->load->view('elements/header');
    $this->load->view('admin/show',$viewData);
    $this->load->view('elements/footer');

}
public function new_message($user_id){
    //Show ex tickets
    $tickets = $this
    ->db
    ->select('U.id,T.ticket_file,T.username,U.ticket_name,U.status,T.ticket_body')
    ->from('users as U')
    ->join('tickets as T','T.user_id=U.id')
    ->where('U.id',$user_id)
    ->get()
    ->result();
    $viewData = new stdClass();
    $viewData->tickets = $tickets;
    //Load view
    $this->load->view('elements/header');
    $this->load->view('admin/message',$viewData);
    $this->load->view('elements/footer');

}
public function reply_ticket($user_id){
    //Get main ticket from 'users'
    $ticket = $this
    ->db
    ->select('*')
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
    $image = $_FILES['ticket_file']['name'];  //name must be ticketfile
    
    $this->upload->do_upload("ticket_file");
    //assign the data to an array 
    $ticket_username = $this->input->post("username");
    $data_tickets = array(
            "username"      => $ticket_username,
            "ticket_name"   => $ticket->ticket_name,
            "ticket_body"   => $ticket_body,
            "ticket_file"   => $image,
            "user_id" => $user_id
            );        
    $insert = $this->db->insert("tickets",$data_tickets);

    if($insert){
        redirect(base_url("admin/show_ticket/$user_id"));
    }else{
        echo "Ticket submitting is failed!!";
    }
}
public function search(){
    $key = $this->input->post('search_text');
    $data['tickets']=$this->Search_model->search($key);
    if(!$data==0){
    $this->load->view('elements/header');
    $this->load->view('admin/main', $data);
    $this->load->view('elements/footer');
    }
    }
} 
