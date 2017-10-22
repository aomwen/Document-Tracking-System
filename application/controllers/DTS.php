<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class Dts extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model('registrarDocumentsModel','regDoc');
			if(isset($_SESSION['username']))
	        {
	            redirect('Dashboard/dashboardview','refresh');
	        }	
		}		
		public function index(){	
		    $regDocuments = array();
	        $condition = null;
	        $rs = $this->regDoc->read($condition);
	        foreach($rs as $r){
	            $info = array(
	            			'idno' => $r['idno'],
	                        'regTrackcode'=> $r['regTrackcode'],
	                        'typeId'=> $r['typeId'],
	                        'dateAdmitted'=> $r['dateAdmitted'],
	                        'dateReleased' => $r['dateReleased'],
	                        'status'=> $r['status'],  
	                        );
	            $regDocuments[] = $info;
	        }      
	        $data['regDocuments'] = $regDocuments;

			$data['title'] = "Document Tracking System - Dashboard";
			$this->load->view('dashboard',$data);
		}
	}

?>