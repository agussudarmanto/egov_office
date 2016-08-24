<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of unoreselon3
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class unoreselon3s extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('unoreselon3.*, unoreselon2.unoreselon2');
        $this->db->join('unoreselon2', 'unoreselon3.unoreselon2_id = unoreselon2.id', 'LEFT');
        $this->db->from('unoreselon3');
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
        $this->db->from('unoreselon3');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('unoreselon3');
        
        $this->db->or_like('unoreselon3.unoreselon2_id', $keyword);
        $this->db->or_like('unoreselon3.unoreselon3', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('unoreselon3.unoreselon2_id', $keyword);
        $this->db->or_like('unoreselon3.unoreselon3', $keyword);
        $this->db->from('unoreselon3');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('unoreselon3');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('unoreselon3.*, unoreselon2.unoreselon2');
        $this->db->join('unoreselon2', 'unoreselon3.unoreselon2_id = unoreselon2.id', 'LEFT');
        $this->db->from('unoreselon3');
        $this->db->where('unoreselon3.id', $id);
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
        	'unoreselon2_id' => '',
        	'unoreselon3' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'unoreselon2_id' => strip_tags($this->input->post('unoreselon2_id', TRUE)),
                'unoreselon3' => strip_tags($this->input->post('unoreselon3', TRUE)),
            );
        $this->db->insert('unoreselon3', $data);
    }
    function update($id) {
        
        $data = array(
                'unoreselon2_id' => strip_tags($this->input->post('unoreselon2_id', TRUE)),
                'unoreselon3' => strip_tags($this->input->post('unoreselon3', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('unoreselon3', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('unoreselon3');
    }
    
	public function get_unoreselon2() 
	{
		$result = $this->db->get('unoreselon2')->result();
		$ret ['']= 'Pilih unoreselon2 :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->unoreselon2;
			}
		}
		return $ret;
	}
}
?>