<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of indikatorkinerjasasaran
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class indikatorkinerjasasarans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('indikatorkinerjasasaran.*, indikatorkinerjakegiatan.indikatorkinerjakegiatan, unoreselon3.unoreselon3, prioritas.prioritas');
        $this->db->join('indikatorkinerjakegiatan', 'indikatorkinerjasasaran.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT');
        $this->db->join('unoreselon3', 'indikatorkinerjasasaran.unoreselon3_id = unoreselon3.id', 'LEFT');
        $this->db->join('prioritas', 'indikatorkinerjasasaran.prioritas_id = prioritas.id', 'LEFT');
        $this->db->from('indikatorkinerjasasaran');
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
        $this->db->from('indikatorkinerjasasaran');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('indikatorkinerjasasaran');
        $this->db->or_like('indikatorkinerjasasaran.indikatorkinerjakegiatan_id', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.unoreselon3_id', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.kode', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.indikatorkinerjasasaran', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.satuan', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.deskripsi', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.prioritas_id', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
		
        $this->db->or_like('indikatorkinerjasasaran.indikatorkinerjakegiatan_id', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.unoreselon3_id', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.kode', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.indikatorkinerjasasaran', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.satuan', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.deskripsi', $keyword);
        $this->db->or_like('indikatorkinerjasasaran.prioritas_id', $keyword);
        $this->db->limit($limit, $offset);
        $result = $this->db->get('indikatorkinerjasasaran');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        
        $this->db->select('indikatorkinerjasasaran.*, indikatorkinerjakegiatan.indikatorkinerjakegiatan, unoreselon3.unoreselon3, prioritas.prioritas');
        $this->db->join('indikatorkinerjakegiatan', 'indikatorkinerjasasaran.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT');
        $this->db->join('unoreselon3', 'indikatorkinerjasasaran.unoreselon3_id = unoreselon3.id', 'LEFT');
        $this->db->join('prioritas', 'indikatorkinerjasasaran.prioritas_id = prioritas.id', 'LEFT');
        $this->db->from('indikatorkinerjasasaran');
        $this->db->where('indikatorkinerjasasaran.id', $id);
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
        	'indikatorkinerjakegiatan_id' => '',
        	'unoreselon3_id' => '',
        	'kode' => '',
        	'indikatorkinerjasasaran' => '',
        	'satuan' => '',
        	'deskripsi' => '',
        	'prioritas_id' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'indikatorkinerjakegiatan_id' => strip_tags($this->input->post('indikatorkinerjakegiatan_id', TRUE)),
                'unoreselon3_id' => strip_tags($this->input->post('unoreselon3_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'indikatorkinerjasasaran' => strip_tags($this->input->post('indikatorkinerjasasaran', TRUE)),
                'satuan' => strip_tags($this->input->post('satuan', TRUE)),
                'deskripsi' => strip_tags($this->input->post('deskripsi', TRUE)),
                'prioritas_id' => strip_tags($this->input->post('prioritas_id', TRUE)),
            );
        echo "<pre>".print_r($data, true)."</pre>";
        $this->db->insert('indikatorkinerjasasaran', $data);
    }
    function update($id) {
        
        $data = array(
                'indikatorkinerjakegiatan_id' => strip_tags($this->input->post('indikatorkinerjakegiatan_id', TRUE)),
                'unoreselon3_id' => strip_tags($this->input->post('unoreselon3_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'indikatorkinerjasasaran' => strip_tags($this->input->post('indikatorkinerjasasaran', TRUE)),
                'satuan' => strip_tags($this->input->post('satuan', TRUE)),
                'deskripsi' => strip_tags($this->input->post('deskripsi', TRUE)),
                'prioritas_id' => strip_tags($this->input->post('prioritas_id', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('indikatorkinerjasasaran', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('indikatorkinerjasasaran');
    }
    
	public function get_indikatorkinerjakegiatan() 
	{
		$result = $this->db->get('indikatorkinerjakegiatan')->result();
		
        $ret ['']= 'Pilih indikatorkinerjakegiatan :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->indikatorkinerjakegiatan;
			}
		}
		return $ret;
	}
	public function get_unoreselon3() 
	{
		$result = $this->db->get('unoreselon3')->result();
		$ret ['']= 'Pilih unoreselon3 :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->unoreselon3;
			}
		}
		return $ret;
	}
	public function get_prioritas() 
	{
		$result = $this->db->get('prioritas')->result();
		$ret ['']= 'Pilih prioritas :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->prioritas;
			}
		}
		return $ret;
	}
}
?>