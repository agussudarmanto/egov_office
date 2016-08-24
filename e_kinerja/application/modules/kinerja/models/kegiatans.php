<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of kegiatan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class kegiatans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('kegiatan.*, unoreselon1.unoreselon1, unoreselon2.unoreselon2');
        $this->db->join('unoreselon1', 'kegiatan.unoreselon1_id = unoreselon1.id', 'LEFT');
        $this->db->join('unoreselon2', 'kegiatan.unoreselon2_id = unoreselon2.id', 'LEFT');
        $this->db->from('kegiatan');
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
        $this->db->from('kegiatan');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('kegiatan');
        
        $this->db->or_like('kegiatan.unoreselon1_id', $keyword);
        $this->db->or_like('kegiatan.unoreselon2_id', $keyword);
        $this->db->or_like('kegiatan.kode', $keyword);
        $this->db->or_like('kegiatan.kegiatan', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('kegiatan.unoreselon1_id', $keyword);
        $this->db->or_like('kegiatan.unoreselon2_id', $keyword);
        $this->db->or_like('kegiatan.kode', $keyword);
        $this->db->or_like('kegiatan.kegiatan', $keyword);
        $this->db->from('kegiatan');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('kegiatan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('kegiatan.*, unoreselon1.unoreselon1, unoreselon2.unoreselon2');
        $this->db->join('unoreselon1', 'kegiatan.unoreselon1_id = unoreselon1.id', 'LEFT');
        $this->db->join('unoreselon2', 'kegiatan.unoreselon2_id = unoreselon2.id', 'LEFT');
        $this->db->from('kegiatan');
        $this->db->where('kegiatan.id', $id);
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
        	'unoreselon2_id' => '',
        	'kode' => '',
        	'kegiatan' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'unoreselon1_id' => strip_tags($this->input->post('unoreselon1_id', TRUE)),
                'unoreselon2_id' => strip_tags($this->input->post('unoreselon2_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'kegiatan' => strip_tags($this->input->post('kegiatan', TRUE)),
            );
        $this->db->insert('kegiatan', $data);
    }
    function update($id) {
        
        $data = array(
                'unoreselon1_id' => strip_tags($this->input->post('unoreselon1_id', TRUE)),
                'unoreselon2_id' => strip_tags($this->input->post('unoreselon2_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'kegiatan' => strip_tags($this->input->post('kegiatan', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('kegiatan', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
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