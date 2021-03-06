<?php

class RolesModel extends CI_model {
	private $table = "roles";
	
	public function create($data){
		if(!$this->db->insert($this->table,$data))
		{
			$error = $this->db->error();
			echo $error;
		}
	}
	public function check_duplicate($data){

        $this->db->where($data);

        $query = $this->db->get($this->table);

        $count_row = $query->num_rows();

        if ($count_row > 0) {
            return TRUE; 
         } else {
            return FALSE; 
         }
    }
	public function read($condition=null){
		$this->db->select('*');
		$this->db->from($this->table);
		if( isset($condition) ) $this->db->where($condition);
		
		$query=$this->db->get();
		$rs = $query->result_array();
		$roles = array();
		foreach($rs as $r){
			$info = array(
				'roleId'=>$r['roleId'],
				'role'=>$r['role'],
			);
			$roles[] = $info;
		}
		return $roles;
	}
	
}