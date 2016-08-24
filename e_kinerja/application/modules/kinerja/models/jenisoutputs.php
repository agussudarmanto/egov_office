<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of jenisoutput
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class jenisoutputs extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('jenisoutput.*');
        $this->db->from('jenisoutput');
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
        $this->db->from('jenisoutput');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('jenisoutput');
        
        $this->db->or_like('jenisoutput.jenisoutput', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('jenisoutput.jenisoutput', $keyword);
        $this->db->from('jenisoutput');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('jenisoutput');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('jenisoutput.*');
        $this->db->from('jenisoutput');
        $this->db->where('jenisoutput.id', $id);
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
        	'jenisoutput' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'jenisoutput' => strip_tags($this->input->post('jenisoutput', TRUE)),
            );
        $this->db->insert('jenisoutput', $data);
    }
    function update($id) {
        
        $data = array(
                'jenisoutput' => strip_tags($this->input->post('jenisoutput', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('jenisoutput', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('jenisoutput');
    }
    
}
?>