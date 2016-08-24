<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller program
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class program extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('programs');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/program/index/'), 'total_rows' => $this->programs->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['programs'] = $this->programs->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('program/view', $data);
    }
    public function add() {
        $data['program'] = $this->programs->add();
        $data['action'] = 'program/save';
        
        $data['unoreselon1'] = $this->programs->get_unoreselon1();   
        $this->template->js_add('$(document).ready(func()$("#form_program").parsley())', 'embed');
        $this->template->render('program/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['program'] = $this->programs->get_one($id);
            $data['action'] = 'program/save/' . $id;
            
        $data['unoreselon1'] = $this->programs->get_unoreselon1();   
            $this->template->js_add('$(document).ready(func()$("#form_program").parsley())', 'embed');
            $this->template->render('program/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/program'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'unoreselon1_id', 'label' => 'Unit Es.I', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode Program', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'program', 'label' => 'Program Es.I', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->programs->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/program'));
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
                    $this->programs->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/program'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['program'] = $this->programs->get_one($id);
            $this->template->render('program/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/program'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/program/search/'), 'total_rows' => $this->programs->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['programs'] = $this->programs->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('program/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->programs->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/program'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/program'));
        }
    }
}
?>