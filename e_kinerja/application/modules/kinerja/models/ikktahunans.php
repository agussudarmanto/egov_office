<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of ikktahunan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class ikktahunans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('ikktahunan.*, indikatorkinerjakegiatan.indikatorkinerjakegiatan');
        $this->db->join('indikatorkinerjakegiatan', 'ikktahunan.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT');
        $this->db->from('ikktahunan');
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
        $this->db->from('ikktahunan');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('ikktahunan');
        
        $this->db->or_like('ikktahunan.indikatorkinerjakegiatan_id', $keyword);
        $this->db->or_like('ikktahunan.tahun', $keyword);
        $this->db->or_like('ikktahunan.nilai', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('ikktahunan.indikatorkinerjakegiatan_id', $keyword);
        $this->db->or_like('ikktahunan.tahun', $keyword);
        $this->db->or_like('ikktahunan.nilai', $keyword);
        $this->db->from('ikktahunan');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('ikktahunan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('ikktahunan.*, indikatorkinerjakegiatan.indikatorkinerjakegiatan');
        $this->db->join('indikatorkinerjakegiatan', 'ikktahunan.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT');
        $this->db->from('ikktahunan');
        $this->db->where('ikktahunan.id', $id);
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
        	'tahun' => '',
        	'nilai' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'indikatorkinerjakegiatan_id' => strip_tags($this->input->post('indikatorkinerjakegiatan_id', TRUE)),
                'tahun' => strip_tags($this->input->post('tahun', TRUE)),
                'nilai' => strip_tags($this->input->post('nilai', TRUE)),
            );
        $this->db->insert('ikktahunan', $data);
    }
    function update($id) {
        
        $data = array(
                'indikatorkinerjakegiatan_id' => strip_tags($this->input->post('indikatorkinerjakegiatan_id', TRUE)),
                'tahun' => strip_tags($this->input->post('tahun', TRUE)),
                'nilai' => strip_tags($this->input->post('nilai', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('ikktahunan', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('ikktahunan');
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
}
?>