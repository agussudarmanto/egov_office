<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of sasaran
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class sasarans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('sasaran.*, kegiatan.kegiatan');
        $this->db->join('kegiatan', 'sasaran.kegiatan_id = kegiatan.id', 'LEFT');
        $this->db->from('sasaran');
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
        $this->db->from('sasaran');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('sasaran');
        
        $this->db->or_like('sasaran.kegiatan_id', $keyword);
        $this->db->or_like('sasaran.kode', $keyword);
        $this->db->or_like('sasaran.sasaran', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('sasaran.kegiatan_id', $keyword);
        $this->db->or_like('sasaran.kode', $keyword);
        $this->db->or_like('sasaran.sasaran', $keyword);
        $this->db->from('sasaran');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('sasaran');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('sasaran.*, kegiatan.kegiatan');
        $this->db->join('kegiatan', 'sasaran.kegiatan_id = kegiatan.id', 'LEFT');
        $this->db->from('sasaran');
        $this->db->where('sasaran.id', $id);
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
        	'kegiatan_id' => '',
        	'kode' => '',
        	'sasaran' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'kegiatan_id' => strip_tags($this->input->post('kegiatan_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'sasaran' => strip_tags($this->input->post('sasaran', TRUE)),
            );
        $this->db->insert('sasaran', $data);
    }
    function update($id) {
        
        $data = array(
                'kegiatan_id' => strip_tags($this->input->post('kegiatan_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'sasaran' => strip_tags($this->input->post('sasaran', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('sasaran', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('sasaran');
    }
    
	public function get_kegiatan() 
	{
		$result = $this->db->get('kegiatan')->result();
		$ret ['']= 'Pilih kegiatan :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->kegiatan;
			}
		}
		return $ret;
	}
}
?>