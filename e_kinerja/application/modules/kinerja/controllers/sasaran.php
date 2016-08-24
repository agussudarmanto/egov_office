<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller sasaran
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class sasaran extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('sasarans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/sasaran/index/'), 'total_rows' => $this->sasarans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['sasarans'] = $this->sasarans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('sasaran/view', $data);
    }
    public function add() {
        $data['sasaran'] = $this->sasarans->add();
        $data['action'] = 'sasaran/save';
        
        $data['kegiatan'] = $this->sasarans->get_kegiatan();   
        $this->template->js_add('$(document).ready(func()$("#form_sasaran").parsley())', 'embed');
        $this->template->render('sasaran/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['sasaran'] = $this->sasarans->get_one($id);
            $data['action'] = 'sasaran/save/' . $id;
            
        $data['kegiatan'] = $this->sasarans->get_kegiatan();   
            $this->template->js_add('$(document).ready(func()$("#form_sasaran").parsley())', 'embed');
            $this->template->render('sasaran/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/sasaran'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'kegiatan_id', 'label' => 'Kegiatan Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode Sasaran Kegiatan Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'sasaran', 'label' => 'Kegiatan', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->sasarans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/sasaran'));
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
                    $this->sasarans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/sasaran'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['sasaran'] = $this->sasarans->get_one($id);
            $this->template->render('sasaran/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/sasaran'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/sasaran/search/'), 'total_rows' => $this->sasarans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['sasarans'] = $this->sasarans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('sasaran/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->sasarans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/sasaran'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/sasaran'));
        }
    }
}
?>