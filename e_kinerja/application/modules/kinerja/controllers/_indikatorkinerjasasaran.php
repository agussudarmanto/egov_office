<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller indikatorkinerjasasaran
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class indikatorkinerjasasaran extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('indikatorkinerjasasarans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/indikatorkinerjasasaran/index/'), 'total_rows' => $this->indikatorkinerjasasarans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['indikatorkinerjasasarans'] = $this->indikatorkinerjasasarans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('indikatorkinerjasasaran/view', $data);
    }
    public function kinerja() {
        $this->db->select("
                kegiatan.id AS kegiatan_id, kegiatan.kode AS kegiatan_kode, kegiatan.kegiatan,
                sasaran.id AS sasaran_id, sasaran.kode AS sasaran_kode, sasaran.sasaran,
                indikatorkinerjakegiatan.id AS indikatorkinerjakegiatan_id, indikatorkinerjakegiatan.kode AS indikatorkinerjakegiatan_kode, 
                indikatorkinerjakegiatan.indikatorkinerjakegiatan AS indikatorkinerjakegiatan
            FROM 
            indikatorkinerjakegiatan LEFT JOIN 
            sasaran ON (indikatorkinerjakegiatan.sasaran_id = sasaran.id) LEFT JOIN 
            kegiatan ON (sasaran.kegiatan_id = kegiatan.id)");

        $data['sasarans'] = $this->db->get()->result_array();
        $this->template->render('indikatorkinerjasasaran/kinerja', $data);
    }
    public function add() {
        $data['indikatorkinerjasasaran'] = $this->indikatorkinerjasasarans->add();
        $data['action'] = 'indikatorkinerjasasaran/save';
        
        $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjasasarans->get_indikatorkinerjakegiatan();
        $data['unoreselon3'] = $this->indikatorkinerjasasarans->get_unoreselon3();
        $data['prioritas'] = $this->indikatorkinerjasasarans->get_prioritas();   
        $this->template->js_add('$(document).ready(func()$("#form_indikatorkinerjasasaran").parsley())', 'embed');
        $this->template->render('indikatorkinerjasasaran/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['indikatorkinerjasasaran'] = $this->indikatorkinerjasasarans->get_one($id);
            $data['action'] = 'indikatorkinerjasasaran/save/' . $id;
            
        $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjasasarans->get_indikatorkinerjakegiatan();
        $data['unoreselon3'] = $this->indikatorkinerjasasarans->get_unoreselon3();
        $data['prioritas'] = $this->indikatorkinerjasasarans->get_prioritas();   
            $this->template->js_add('$(document).ready(func()$("#form_indikatorkinerjasasaran").parsley())', 'embed');
            $this->template->render('indikatorkinerjasasaran/form', $data);
        } 
        else {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'indikatorkinerjakegiatan_id', 'label' => 'Indikatorkinerjakegiatan_id', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'unoreselon3_id', 'label' => 'Unor Eselon 3', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'indikatorkinerjasasaran', 'label' => 'Indikatorkinerjasasaran', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'satuan', 'label' => 'Satuan', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'deskripsi', 'label' => 'Deskripsi', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'prioritas_id', 'label' => 'Prioritas_id', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->indikatorkinerjasasarans->save();
                    $this->session->set_flashdata('notif', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/indikatorkinerjasasaran'));
                }
            } 
            else {
                $this->add();
            }
        } 
        else {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->indikatorkinerjasasarans->update($id);
                    $this->session->set_flashdata('notif', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/indikatorkinerjasasaran'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['indikatorkinerjasasaran'] = $this->indikatorkinerjasasarans->get_one($id);
            $this->template->render('indikatorkinerjasasaran/show', $data);
        } 
        else {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/indikatorkinerjasasaran/search/'), 'total_rows' => $this->indikatorkinerjasasarans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['indikatorkinerjasasarans'] = $this->indikatorkinerjasasarans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('indikatorkinerjasasaran/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->indikatorkinerjasasarans->destroy($id);
            $this->session->set_flashdata('notif', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        } 
        else {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }
}
?>