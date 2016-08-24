<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of output
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class outputs extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('output.*, indikatorkinerjakegiatan.indikatorkinerjakegiatan, unoreselon3.unoreselon3, jenisoutput.jenisoutput');
        $this->db->join('indikatorkinerjakegiatan', 'output.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT');
        $this->db->join('unoreselon3', 'output.unoreselon3_id = unoreselon3.id', 'LEFT');
        $this->db->join('jenisoutput', 'output.jenisoutput_id = jenisoutput.id', 'LEFT');
        $this->db->from('output');
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
        $this->db->from('output');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('output');
        
        $this->db->or_like('output.indikatorkinerjakegiatan_id', $keyword);
        $this->db->or_like('output.unoreselon3_id', $keyword);
        $this->db->or_like('output.kode', $keyword);
        $this->db->or_like('output.output', $keyword);
        $this->db->or_like('output.jenisoutput_id', $keyword);
        $this->db->or_like('output.output', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('output.indikatorkinerjakegiatan_id', $keyword);
        $this->db->or_like('output.unoreselon3_id', $keyword);
        $this->db->or_like('output.kode', $keyword);
        $this->db->or_like('output.output', $keyword);
        $this->db->or_like('output.jenisoutput_id', $keyword);
        $this->db->or_like('output.output', $keyword);
        $this->db->from('output');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('output');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('output.*, indikatorkinerjakegiatan.indikatorkinerjakegiatan, unoreselon3.unoreselon3, jenisoutput.jenisoutput');
        $this->db->join('indikatorkinerjakegiatan', 'output.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT');
        $this->db->join('unoreselon3', 'output.unoreselon3_id = unoreselon3.id', 'LEFT');
        $this->db->join('jenisoutput', 'output.jenisoutput_id = jenisoutput.id', 'LEFT');
        $this->db->from('output');
        $this->db->where('output.id', $id);
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
        	'output' => '',
        	'jenisoutput_id' => '',
        	'output' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'indikatorkinerjakegiatan_id' => strip_tags($this->input->post('indikatorkinerjakegiatan_id', TRUE)),
                'unoreselon3_id' => strip_tags($this->input->post('unoreselon3_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'output' => strip_tags($this->input->post('output', TRUE)),
                'jenisoutput_id' => strip_tags($this->input->post('jenisoutput_id', TRUE)),
                'output' => strip_tags($this->input->post('output', TRUE)),
            );
        $this->db->insert('output', $data);
    }
    function update($id) {
        
        $data = array(
                'indikatorkinerjakegiatan_id' => strip_tags($this->input->post('indikatorkinerjakegiatan_id', TRUE)),
                'unoreselon3_id' => strip_tags($this->input->post('unoreselon3_id', TRUE)),
                'kode' => strip_tags($this->input->post('kode', TRUE)),
                'output' => strip_tags($this->input->post('output', TRUE)),
                'jenisoutput_id' => strip_tags($this->input->post('jenisoutput_id', TRUE)),
                'output' => strip_tags($this->input->post('output', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('output', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('output');
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
	public function get_jenisoutput() 
	{
		$result = $this->db->get('jenisoutput')->result();
		$ret ['']= 'Pilih jenisoutput :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->jenisoutput;
			}
		}
		return $ret;
	}
}
?>