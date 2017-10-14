<?php

class documentsModel extends CI_Model {
    
	private $table = "documents";
	
	public function create($data){
		$this->db->insert($this->table, $data);
		return TRUE;	
	}
	
	public function read($condition=null){
		$this->db->select('*');
		$this->db->from($this->table); 
		if( isset($condition) ) $this->db->where($condition);
		$query=$this->db->get();
		$rs = $query->result_array();		
		$documents = array();
		foreach($rs as $r){
                    $info = array(
                                'trackcode' => $r['trackcode'],
		                        'filename' => $r['filename'],
		                        'sender' => $r['sender'],
		                        'receiver' => $r['receiver'],
		                        'datecreated' => $r['datecreated'],
		                        'dateReceived' => $r['dateReceived'],
		                        'status' => $r['status'],    
		                        'path'=>$r['path'],
		                        'fileDesc' => $r['fileDesc'],
		                        'seen' => $r['seen'],
		                        'sentDelete' => $r['sentDelete'],
		                        'inboxDelete' => $r['inboxDelete'],
		                        'draft' => $r['draft']            
                                );
                    $documents[] = $info;
            }
        return $documents;
	}
	
	public function update($data){
		$this->db->where($data);
		$this->db->update($this->table, $data);
		return TRUE;	
	}

	public function read1($condition){
		$this->db->select('*');
		$this->db->from ($this->table);
		if(isset($condition)) $this->db->where($condition);
		$query2=$this->db->get();
		$rs2 = $query2->result_array();		
		$documents2 = array();
		foreach($rs2 as $r2){
                    $info2 = array(
                            'filename' => $r2['filename'],
                            'path' => $r2['path'],
                                );
                    $documents2[] = $info2;
            }return $documents2;
        }
	public function deleteToSent($data,$condition){
		$this->db->update($this->table, $data,$condition);
		return TRUE;	
	}

	public function deleteToInbox($data,$condition){
		$this->db->update($this->table, $data,$condition);
		return TRUE;	
	}
	public function Seen($data,$condition){
		$this->db->update($this->table, $data,$condition);

		return TRUE;	
	}

	public function remove_draft($data){
		$this->db->where('trackcode',$data);
		$this->db->delete($this->table);
		return TRUE;	
	}
}