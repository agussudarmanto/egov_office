<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of outcome
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class outcomes extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('outcome.*, unoreselon1.unoreselon1');
        $this->db->join('unoreselon1', 'outcome.unoreselon1_id = unoreselon1.id', 'LEFT');
        $this->db->from('outcome');
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
        $this->db->from('outcome');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('outcome');
        
        $this->db->or_like('outcome.unoreselon1_id', $keyword);
        $this->db->or_like('outcome.outcome', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('outcome.unoreselon1_id', $keyword);
        $this->db->or_like('outcome.outcome', $keyword);
        $this->db->from('outcome');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('outcome');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('outcome.*, unoreselon1.unoreselon1');
        $this->db->join('unoreselon1', 'outcome.unoreselon1_id = unoreselon1.id', 'LEFT');
        $this->db->from('outcome');
        $this->db->where('outcome.id', $id);
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
        	'outcome' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'unoreselon1_id' => strip_tags($this->input->post('unoreselon1_id', TRUE)),
                'outcome' => strip_tags($this->input->post('outcome', TRUE)),
            );
        $this->db->insert('outcome', $data);
    }
    function update($id) {
        
        $data = array(
                'unoreselon1_id' => strip_tags($this->input->post('unoreselon1_id', TRUE)),
                'outcome' => strip_tags($this->input->post('outcome', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('outcome', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('outcome');
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