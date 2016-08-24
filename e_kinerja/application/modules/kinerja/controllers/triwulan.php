<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller triwulan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class triwulan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('triwulans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/triwulan/index/'), 'total_rows' => $this->triwulans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['triwulans'] = $this->triwulans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('triwulan/view', $data);
    }
    public function add() {
        $data['triwulan'] = $this->triwulans->add();
        $data['action'] = 'triwulan/save';
           
        $this->template->js_add('$(document).ready(func()$("#form_triwulan").parsley())', 'embed');
        $this->template->render('triwulan/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['triwulan'] = $this->triwulans->get_one($id);
            $data['action'] = 'triwulan/save/' . $id;
               
            $this->template->js_add('$(document).ready(func()$("#form_triwulan").parsley())', 'embed');
            $this->template->render('triwulan/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/triwulan'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'triwulan', 'label' => 'Triwulan', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->triwulans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/triwulan'));
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
                    $this->triwulans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/triwulan'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['triwulan'] = $this->triwulans->get_one($id);
            $this->template->render('triwulan/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/triwulan'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/triwulan/search/'), 'total_rows' => $this->triwulans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['triwulans'] = $this->triwulans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('triwulan/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->triwulans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/triwulan'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/triwulan'));
        }
    }
}
?>