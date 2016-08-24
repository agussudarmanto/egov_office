<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller indikatorkinerjakegiatan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class indikatorkinerjakegiatan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('indikatorkinerjakegiatans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/indikatorkinerjakegiatan/index/'), 'total_rows' => $this->indikatorkinerjakegiatans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['indikatorkinerjakegiatans'] = $this->indikatorkinerjakegiatans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('indikatorkinerjakegiatan/view', $data);
    }
    public function add() {
        $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjakegiatans->add();
        $data['action'] = 'indikatorkinerjakegiatan/save';
        
        $data['sasaran'] = $this->indikatorkinerjakegiatans->get_sasaran();
        $data['dukungan'] = $this->indikatorkinerjakegiatans->get_dukungan();
        $data['prioritas'] = $this->indikatorkinerjakegiatans->get_prioritas();   
        $this->template->js_add('$(document).ready(func()$("#form_indikatorkinerjakegiatan").parsley())', 'embed');
        $this->template->render('indikatorkinerjakegiatan/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjakegiatans->get_one($id);
            $data['action'] = 'indikatorkinerjakegiatan/save/' . $id;
            
        $data['sasaran'] = $this->indikatorkinerjakegiatans->get_sasaran();
        $data['dukungan'] = $this->indikatorkinerjakegiatans->get_dukungan();
        $data['prioritas'] = $this->indikatorkinerjakegiatans->get_prioritas();   
            $this->template->js_add('$(document).ready(func()$("#form_indikatorkinerjakegiatan").parsley())', 'embed');
            $this->template->render('indikatorkinerjakegiatan/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjakegiatan'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'sasaran_id', 'label' => 'Sasaran Kegiatan Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'dukungan_id', 'label' => 'Dukungan Kegiatan Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode IKK Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'indikatorkinerjakegiatan', 'label' => 'IKK Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'satuan', 'label' => 'Satuan', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'prioritas_id', 'label' => 'Prioritas Es.I', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->indikatorkinerjakegiatans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/indikatorkinerjakegiatan'));
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
                    $this->indikatorkinerjakegiatans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/indikatorkinerjakegiatan'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjakegiatans->get_one($id);
            $this->template->render('indikatorkinerjakegiatan/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjakegiatan'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/indikatorkinerjakegiatan/search/'), 'total_rows' => $this->indikatorkinerjakegiatans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['indikatorkinerjakegiatans'] = $this->indikatorkinerjakegiatans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('indikatorkinerjakegiatan/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->indikatorkinerjakegiatans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/indikatorkinerjakegiatan'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/indikatorkinerjakegiatan'));
        }
    }
}
?>