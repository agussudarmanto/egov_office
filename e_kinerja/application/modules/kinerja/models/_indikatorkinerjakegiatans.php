<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of indikatorkinerjakegiatan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class indikatorkinerjakegiatans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('indikatorkinerjakegiatan.*, sasaran.sasaran, dukungan.dukungan, prioritas.prioritas');
        $this->db->join('sasaran',      'indikatorkinerjakegiatan.sasaran_id = sasaran.id', 'LEFT');
        $this->db->join('dukungan',     'indikatorkinerjakegiatan.dukungan_id = dukungan.id', 'LEFT');
        $this->db->join('prioritas',    'indikatorkinerjakegiatan.prioritas_id = prioritas.id', 'LEFT');
        $this->db->from('indikatorkinerjakegiatan');
        $this->db->limit($limit, $offset);
        //$query = $this->db->get();

        //$result = $this->db->get('indikatorkinerjakegiatan', $limit, $offset);
        $result = $this->db->get();
        echo "<br><br><pre>".print_r($this->db->last_query(), true)."</pre>";
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('indikatorkinerjakegiatan.*, sasaran.sasaran, dukungan.dukungan, prioritas.prioritas');
        $this->db->join('sasaran',      'indikatorkinerjakegiatan.sasaran_id = sasaran.id', 'LEFT');
        $this->db->join('dukungan',     'indikatorkinerjakegiatan.dukungan_id = dukungan.id', 'LEFT');
        $this->db->join('prioritas',    'indikatorkinerjakegiatan.prioritas_id = prioritas.id', 'LEFT');
        $this->db->from('indikatorkinerjakegiatan');
        $this->db->where('indikatorkinerjakegiatan.id', $id);
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } 
        else {
            return array();
        }
    }
    function count_all() {
        $this->db->from('indikatorkinerjakegiatan');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('indikatorkinerjakegiatan');
        
        $this->db->like('sasarankegiatan_id', $keyword);
        $this->db->like('dukungan_id', $keyword);
        $this->db->like('kode', $keyword);
        $this->db->like('nama', $keyword);
        $this->db->like('satuan', $keyword);
        $this->db->like('prioritas_id', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->like('sasarankegiatan_id', $keyword);
        $this->db->like('dukungan_id', $keyword);
        $this->db->like('kode', $keyword);
        $this->db->like('nama', $keyword);
        $this->db->like('satuan', $keyword);
        $this->db->like('prioritas_id', $keyword);
        $this->db->limit($limit, $offset);
        $result = $this->db->get('indikatorkinerjakegiatan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function add() {
        $data = array(
        	'sasarankegiatan_id' => '',
        	'dukungan_id' => '',
        	'kode' => '',
        	'nama' => '',
        	'satuan' => '',
        	'prioritas_id' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'sasarankegiatan_id' => strip_tags($this->input->post('sasarankegiatan_id', TRUE)),
                'dukungan_id' => strip_tags($this->input->post('dukungan_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'nama' => strip_tags($this->input->post('nama', TRUE)),
                'satuan' => strip_tags($this->input->post('satuan', TRUE)),
                'prioritas_id' => strip_tags($this->input->post('prioritas_id', TRUE)),
            );
        $this->db->insert('indikatorkinerjakegiatan', $data);
    }
    function update($id) {
        
        $data = array(
                'sasarankegiatan_id' => strip_tags($this->input->post('sasarankegiatan_id', TRUE)),
                'dukungan_id' => strip_tags($this->input->post('dukungan_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'nama' => strip_tags($this->input->post('nama', TRUE)),
                'satuan' => strip_tags($this->input->post('satuan', TRUE)),
                'prioritas_id' => strip_tags($this->input->post('prioritas_id', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('indikatorkinerjakegiatan', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('indikatorkinerjakegiatan');
    }
    
	public function get_sasarankegiatan() 
	{
		$result = $this->db->get('sasaran')->result();
		$ret ['']= 'Pilih sasaran :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->sasaran;
			}
		}
		return $ret;
	}
	public function get_dukungan() 
	{
		$result = $this->db->get('dukungan')->result();
		$ret ['']= 'Pilih dukungan :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->dukungan;
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