<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
    public $user='';

    public function __construct(){
        parent::__construct();
        $this->load->model('usersModel','User');
        $this->load->model('filesModel','files');
        if(!isset($_SESSION['username'])){
             redirect().'Dts/index';
        }else{
            $this->user = $this->session->userdata('username');
        }
    }
    
    // LIST OF FUNCTIONS
    // viewAccount - LOGIC[/] -DESIGN[]
    // updateInformation - LOGIC[/] -DESIGN[]
    // updateProfileImage - LOGIC[/] -DESIGN[/]
    // resetUserInfo - LOGIC[/]
    // changePassword - LOGIC[/] -DESIGN[/]
    
    public function viewAccount()
    {
        $data['title'] = "Document Tracking System - Dashboard";
        //GETTING USERDATA
        $condition = array('username' => $this->user);
        $userdata = $this->User->read($condition);
        $data['userdata'] = $userdata;

        $this->load->view('include/headerNew',$data);
        if($_SESSION['username'] == "admin"){  
            $this->load->view('sidebarAdmin');
        }else{
            $this->load->view('sidebar');     
        } 
        $this->load->view('navbar'); 
        $this->load->view('accountView');     
        $this->load->view('include/footerNew');   
    }

    public function updateInformation()
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $college = $_POST['collegeId'];
        $department = $_POST['department'];
        $condition = array('username'=>$this->user);
        $record = array('firstname'=>$first_name,
                        'lastname' =>$last_name,
                        'position' =>$position,
                        'email'=>$email,);
        if($this->User->update($condition,$record))
        {     
            $this->resetUserInfo();
        }else{
            echo '<script type="text/javascript">
                     alert("Error occur during updating Information!"); 
                </script>';
        }
    }

    public function updateProfileImage(){
        if( $_SERVER['REQUEST_METHOD']=='POST'){ 
            $img_path='';
            if(isset($_FILES["newprofile"]["name"])){
                $config['upload_path'] = './uploads/user/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('newprofile')){
                    echo $this->upload->display_error();
                }else{
                    $data = $this->upload->data();
                    echo '<img class="img-responsive img-thumbnail"   src="'.base_url().'uploads/user/'.$data["file_name"].'" />';
                    $img_path=base_url().'uploads/user/'.$data["file_name"];
                    $condition = array('username'=>$this->user);
                    $picture = array('path'=>$img_path,);
                    $success = $this->User->update($condition,$picture);
                    echo '<script type="text/javascript"> alert("User Profile Image has been Successfully Change!"); 
                    </script>'; 
                    $this->resetUserInfo();  
                }
            }       
        }

    }

    public function resetUserInfo()
    {
        session_unset('username');
        $session_data = array('username' => $this->user);
        $this->session->set_userdata($session_data);
    }

    public function changePassword()
    {
        if( $_SERVER['REQUEST_METHOD']=='POST'){ 
            $validate = array(
            array('field'=>'newpassword', 'label'=>'newpassword', 'rules'=>'required|min_length[5]'),
            array('field'=>'confirmpassword', 'label'=>'confirmpassword', 'rules'=>'required|min_length[5]'),
            );
            $this->form_validation->set_rules($validate);
            if ($this->form_validation->run() === FALSE)
            {

            }       
            else
            {   $condition = array('username'=> $this->user);
                $pass_record = array('password'=>$_POST['newpassword'] );  
                $success = $this->User->update($condition,$pass_record);
                $this->resetUserInfo();
            }           
        }
    }
    
}
?>