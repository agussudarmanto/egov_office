<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of prioritas
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class prioritass extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('prioritas.*');
        $this->db->from('prioritas');
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
        $this->db->from('prioritas');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('prioritas');
        
        $this->db->or_like('prioritas.prioritas', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('prioritas.prioritas', $keyword);
        $this->db->from('prioritas');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('prioritas');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('prioritas.*');
        $this->db->from('prioritas');
        $this->db->where('prioritas.id', $id);
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
        	'prioritas' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'prioritas' => strip_tags($this->input->post('prioritas', TRUE)),
            );
        $this->db->insert('prioritas', $data);
    }
    function update($id) {
        
        $data = array(
                'prioritas' => strip_tags($this->input->post('prioritas', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('prioritas', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('prioritas');
    }
    
}
?>