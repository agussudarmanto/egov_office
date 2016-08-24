<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller kegiatan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class kegiatan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('kegiatans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/kegiatan/index/'), 'total_rows' => $this->kegiatans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['kegiatans'] = $this->kegiatans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('kegiatan/view', $data);
    }
    public function add() {
        $data['kegiatan'] = $this->kegiatans->add();
        $data['action'] = 'kegiatan/save';
        
        $data['unoreselon1'] = $this->kegiatans->get_unoreselon1();
        $data['unoreselon2'] = $this->kegiatans->get_unoreselon2();   
        $this->template->js_add('$(document).ready(func()$("#form_kegiatan").parsley())', 'embed');
        $this->template->render('kegiatan/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['kegiatan'] = $this->kegiatans->get_one($id);
            $data['action'] = 'kegiatan/save/' . $id;
            
        $data['unoreselon1'] = $this->kegiatans->get_unoreselon1();
        $data['unoreselon2'] = $this->kegiatans->get_unoreselon2();   
            $this->template->js_add('$(document).ready(func()$("#form_kegiatan").parsley())', 'embed');
            $this->template->render('kegiatan/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/kegiatan'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'unoreselon1_id', 'label' => 'Unit Es.I', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'unoreselon2_id', 'label' => 'Unit Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode Kegiatan Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kegiatan', 'label' => 'Kegiatan', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->kegiatans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/kegiatan'));
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
                    $this->kegiatans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/kegiatan'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['kegiatan'] = $this->kegiatans->get_one($id);
            $this->template->render('kegiatan/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/kegiatan'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/kegiatan/search/'), 'total_rows' => $this->kegiatans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['kegiatans'] = $this->kegiatans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('kegiatan/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->kegiatans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/kegiatan'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/kegiatan'));
        }
    }
}
?>