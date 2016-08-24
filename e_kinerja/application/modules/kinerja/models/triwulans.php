<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of triwulan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class triwulans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('triwulan.*');
        $this->db->from('triwulan');
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
        $this->db->from('triwulan');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('triwulan');
        
        $this->db->or_like('triwulan.triwulan', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('triwulan.triwulan', $keyword);
        $this->db->from('triwulan');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('triwulan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('triwulan.*');
        $this->db->from('triwulan');
        $this->db->where('triwulan.id', $id);
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
        	'triwulan' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'triwulan' => strip_tags($this->input->post('triwulan', TRUE)),
            );
        $this->db->insert('triwulan', $data);
    }
    function update($id) {
        
        $data = array(
                'triwulan' => strip_tags($this->input->post('triwulan', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('triwulan', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('triwulan');
    }
    
}
?>