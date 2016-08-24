<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of program
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class programs extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('program.*, unoreselon1.unoreselon1');
        $this->db->join('unoreselon1', 'program.unoreselon1_id = unoreselon1.id', 'LEFT');
        $this->db->from('program');
        $this->db->limit($limit, $offset);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function count_all() {
        $this->db->from('program');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('program');
        
        $this->db->or_like('program.unoreselon1_id', $keyword);
        $this->db->or_like('program.kode', $keyword);
        $this->db->or_like('program.program', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('program.unoreselon1_id', $keyword);
        $this->db->or_like('program.kode', $keyword);
        $this->db->or_like('program.program', $keyword);
        $this->db->from('program');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('program');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('program.*, unoreselon1.unoreselon1');
        $this->db->join('unoreselon1', 'program.unoreselon1_id = unoreselon1.id', 'LEFT');
        $this->db->from('program');
        $this->db->where('program.id', $id);
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } 
        else {
            return array();
        }
    }
    function add() {
        $data = array(
        	'unoreselon1_id' => '',
        	'kode' => '',
        	'program' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'unoreselon1_id' => strip_tags($this->input->post('unoreselon1_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'program' => strip_tags($this->input->post('program', TRUE)),
            );
        $this->db->insert('program', $data);
    }
    function update($id) {
        
        $data = array(
                'unoreselon1_id' => strip_tags($this->input->post('unoreselon1_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'program' => strip_tags($this->input->post('program', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('program', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('program');
    }
    
	public function get_unoreselon1() 
	{
		$result = $this->db->get('unoreselon1')->result();
		$ret ['']= 'Pilih unoreselon1 :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->unoreselon1;
			}
		}
		return $ret;
	}
}
?>