<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller iku
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class iku extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('ikus');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/iku/index/'), 'total_rows' => $this->ikus->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['ikus'] = $this->ikus->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('iku/view', $data);
    }
    public function add() {
        $data['iku'] = $this->ikus->add();
        $data['action'] = 'iku/save';
        
        $data['unoreselon1'] = $this->ikus->get_unoreselon1();   
        $this->template->js_add('$(document).ready(func()$("#form_iku").parsley())', 'embed');
        $this->template->render('iku/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['iku'] = $this->ikus->get_one($id);
            $data['action'] = 'iku/save/' . $id;
            
        $data['unoreselon1'] = $this->ikus->get_unoreselon1();   
            $this->template->js_add('$(document).ready(func()$("#form_iku").parsley())', 'embed');
            $this->template->render('iku/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/iku'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'unoreselon1_id', 'label' => 'Unit Es.I', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'iku', 'label' => 'Misi', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->ikus->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/iku'));
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
                    $this->ikus->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/iku'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['iku'] = $this->ikus->get_one($id);
            $this->template->render('iku/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/iku'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/iku/search/'), 'total_rows' => $this->ikus->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['ikus'] = $this->ikus->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('iku/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->ikus->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/iku'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/iku'));
        }
    }
}
?>