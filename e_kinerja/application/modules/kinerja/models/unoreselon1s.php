<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of unoreselon1
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class unoreselon1s extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('unoreselon1.*');
        $this->db->from('unoreselon1');
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
        $this->db->from('unoreselon1');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('unoreselon1');
        
        $this->db->or_like('unoreselon1.unoreselon1', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('unoreselon1.unoreselon1', $keyword);
        $this->db->from('unoreselon1');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('unoreselon1');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('unoreselon1.*');
        $this->db->from('unoreselon1');
        $this->db->where('unoreselon1.id', $id);
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
        	'unoreselon1' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'unoreselon1' => strip_tags($this->input->post('unoreselon1', TRUE)),
            );
        $this->db->insert('unoreselon1', $data);
    }
    function update($id) {
        
        $data = array(
                'unoreselon1' => strip_tags($this->input->post('unoreselon1', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('unoreselon1', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('unoreselon1');
    }
    
}
?>