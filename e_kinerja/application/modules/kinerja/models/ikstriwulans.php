<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of ikstriwulan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 */

class ikstriwulans extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function get_all($limit, $offset) {
        $this->db->select('ikstriwulan.*, indikatorkinerjasasaran.indikatorkinerjasasaran, triwulan.triwulan');
        $this->db->join('indikatorkinerjasasaran', 'ikstriwulan.indikatorkinerjasasaran_id = indikatorkinerjasasaran.id', 'LEFT');
        $this->db->join('triwulan', 'ikstriwulan.triwulan_id = triwulan.id', 'LEFT');
        $this->db->from('ikstriwulan');
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
        $this->db->from('ikstriwulan');
        return $this->db->count_all_results();
    }
    function count_all_search() {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('ikstriwulan');
        
        $this->db->or_like('ikstriwulan.indikatorkinerjasasaran_id', $keyword);
        $this->db->or_like('ikstriwulan.tahun', $keyword);
        $this->db->or_like('ikstriwulan.triwulan_id', $keyword);
        $this->db->or_like('ikstriwulan.target', $keyword);
        $this->db->or_like('ikstriwulan.realisasi', $keyword);
        $this->db->or_like('ikstriwulan.analisiscapaian', $keyword);
        $this->db->or_like('ikstriwulan.faktorkeberhasilan', $keyword);
        $this->db->or_like('ikstriwulan.faktorkegagalan', $keyword);
        $this->db->or_like('ikstriwulan.solusi', $keyword);
        $this->db->or_like('ikstriwulan.sumberdaya', $keyword);
        $this->db->or_like('ikstriwulan.kegiatanpenunjang', $keyword);
        return $this->db->count_all_results();
    }
    function get_search($limit, $offset) {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->or_like('ikstriwulan.indikatorkinerjasasaran_id', $keyword);
        $this->db->or_like('ikstriwulan.tahun', $keyword);
        $this->db->or_like('ikstriwulan.triwulan_id', $keyword);
        $this->db->or_like('ikstriwulan.target', $keyword);
        $this->db->or_like('ikstriwulan.realisasi', $keyword);
        $this->db->or_like('ikstriwulan.analisiscapaian', $keyword);
        $this->db->or_like('ikstriwulan.faktorkeberhasilan', $keyword);
        $this->db->or_like('ikstriwulan.faktorkegagalan', $keyword);
        $this->db->or_like('ikstriwulan.solusi', $keyword);
        $this->db->or_like('ikstriwulan.sumberdaya', $keyword);
        $this->db->or_like('ikstriwulan.kegiatanpenunjang', $keyword);
        $this->db->from('ikstriwulan');
        $this->db->limit($limit, $offset);
        $result = $this->db->get('ikstriwulan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } 
        else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->select('ikstriwulan.*, indikatorkinerjasasaran.indikatorkinerjasasaran, triwulan.triwulan');
        $this->db->join('indikatorkinerjasasaran', 'ikstriwulan.indikatorkinerjasasaran_id = indikatorkinerjasasaran.id', 'LEFT');
        $this->db->join('triwulan', 'ikstriwulan.triwulan_id = triwulan.id', 'LEFT');
        $this->db->from('ikstriwulan');
        $this->db->where('ikstriwulan.id', $id);
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
        	'indikatorkinerjasasaran_id' => '',
        	'tahun' => '',
        	'triwulan_id' => '',
        	'target' => '',
        	'realisasi' => '',
        	'analisiscapaian' => '',
        	'faktorkeberhasilan' => '',
        	'faktorkegagalan' => '',
        	'solusi' => '',
        	'sumberdaya' => '',
        	'kegiatanpenunjang' => '',
        	'_' => ''
        );
        return $data;
    }
    function save() {
        
        $data = array(
                'indikatorkinerjasasaran_id' => strip_tags($this->input->post('indikatorkinerjasasaran_id', TRUE)),
                'tahun' => strip_tags($this->input->post('tahun', TRUE)),
                'triwulan_id' => strip_tags($this->input->post('triwulan_id', TRUE)),
                'target' => strip_tags($this->input->post('target', TRUE)),
                'realisasi' => strip_tags($this->input->post('realisasi', TRUE)),
                'analisiscapaian' => strip_tags($this->input->post('analisiscapaian', TRUE)),
                'faktorkeberhasilan' => strip_tags($this->input->post('faktorkeberhasilan', TRUE)),
                'faktorkegagalan' => strip_tags($this->input->post('faktorkegagalan', TRUE)),
                'solusi' => strip_tags($this->input->post('solusi', TRUE)),
                'sumberdaya' => strip_tags($this->input->post('sumberdaya', TRUE)),
                'kegiatanpenunjang' => strip_tags($this->input->post('kegiatanpenunjang', TRUE)),
            );
        $this->db->insert('ikstriwulan', $data);
    }
    function update($id) {
        
        $data = array(
                'indikatorkinerjasasaran_id' => strip_tags($this->input->post('indikatorkinerjasasaran_id', TRUE)),
                'tahun' => strip_tags($this->input->post('tahun', TRUE)),
                'triwulan_id' => strip_tags($this->input->post('triwulan_id', TRUE)),
                'target' => strip_tags($this->input->post('target', TRUE)),
                'realisasi' => strip_tags($this->input->post('realisasi', TRUE)),
                'analisiscapaian' => strip_tags($this->input->post('analisiscapaian', TRUE)),
                'faktorkeberhasilan' => strip_tags($this->input->post('faktorkeberhasilan', TRUE)),
                'faktorkegagalan' => strip_tags($this->input->post('faktorkegagalan', TRUE)),
                'solusi' => strip_tags($this->input->post('solusi', TRUE)),
                'sumberdaya' => strip_tags($this->input->post('sumberdaya', TRUE)),
                'kegiatanpenunjang' => strip_tags($this->input->post('kegiatanpenunjang', TRUE)),
            );
        $this->db->where('id', $id);
        $this->db->update('ikstriwulan', $data);
    }
    function destroy($id) {
        $this->db->where('id', $id);
        $this->db->delete('ikstriwulan');
    }
    
	public function get_indikatorkinerjasasaran() 
	{
		$result = $this->db->get('indikatorkinerjasasaran')->result();
		$ret ['']= 'Pilih indikatorkinerjasasaran :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->indikatorkinerjasasaran;
			}
		}
		return $ret;
	}
	public function get_triwulan() 
	{
		$result = $this->db->get('triwulan')->result();
		$ret ['']= 'Pilih triwulan :';
		if($result)
		{
			foreach ($result as $key => $row)
			{
				$ret [$row->id] = $row->triwulan;
			}
		}
		return $ret;
	}
}
?>