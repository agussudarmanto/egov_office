<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of dukungan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class dukungans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('dukungan.*');
        $this->db->from('dukungan');
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
        $this->db->from('dukungan');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('dukungan');
        
        $this->db->or_like('dukungan.dukungan', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('dukungan.dukungan', $keyword);
        $this->db->from('dukungan');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('dukungan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('dukungan.*');
        $this->db->from('dukungan');
        $this->db->where('dukungan.id', $id);
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
        	'dukungan' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'dukungan' => strip_tags($this->input->post('dukungan', TRUE)),
            );
        $this->db->insert('dukungan', $data);
    }
    function update($id) {
        
        $data = array(
                'dukungan' => strip_tags($this->input->post('dukungan', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('dukungan', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('dukungan');
    }
    
}
?>