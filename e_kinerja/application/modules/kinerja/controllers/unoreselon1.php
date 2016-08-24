<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller unoreselon1
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class unoreselon1 extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('unoreselon1s');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/unoreselon1/index/'), 'total_rows' => $this->unoreselon1s->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['unoreselon1s'] = $this->unoreselon1s->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('unoreselon1/view', $data);
    }
    public function add() {
        $data['unoreselon1'] = $this->unoreselon1s->add();
        $data['action'] = 'unoreselon1/save';
           
        $this->template->js_add('$(document).ready(func()$("#form_unoreselon1").parsley())', 'embed');
        $this->template->render('unoreselon1/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['unoreselon1'] = $this->unoreselon1s->get_one($id);
            $data['action'] = 'unoreselon1/save/' . $id;
               
            $this->template->js_add('$(document).ready(func()$("#form_unoreselon1").parsley())', 'embed');
            $this->template->render('unoreselon1/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/unoreselon1'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'unoreselon1', 'label' => 'Unit Es.I', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->unoreselon1s->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/unoreselon1'));
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
                    $this->unoreselon1s->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/unoreselon1'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['unoreselon1'] = $this->unoreselon1s->get_one($id);
            $this->template->render('unoreselon1/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/unoreselon1'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/unoreselon1/search/'), 'total_rows' => $this->unoreselon1s->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['unoreselon1s'] = $this->unoreselon1s->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('unoreselon1/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->unoreselon1s->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/unoreselon1'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/unoreselon1'));
        }
    }
}
?>