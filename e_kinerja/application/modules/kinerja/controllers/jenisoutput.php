<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller jenisoutput
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class jenisoutput extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('jenisoutputs');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/jenisoutput/index/'), 'total_rows' => $this->jenisoutputs->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['jenisoutputs'] = $this->jenisoutputs->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('jenisoutput/view', $data);
    }
    public function add() {
        $data['jenisoutput'] = $this->jenisoutputs->add();
        $data['action'] = 'jenisoutput/save';
           
        $this->template->js_add('$(document).ready(func()$("#form_jenisoutput").parsley())', 'embed');
        $this->template->render('jenisoutput/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['jenisoutput'] = $this->jenisoutputs->get_one($id);
            $data['action'] = 'jenisoutput/save/' . $id;
               
            $this->template->js_add('$(document).ready(func()$("#form_jenisoutput").parsley())', 'embed');
            $this->template->render('jenisoutput/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/jenisoutput'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'jenisoutput', 'label' => 'Jenis Output', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->jenisoutputs->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/jenisoutput'));
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
                    $this->jenisoutputs->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/jenisoutput'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['jenisoutput'] = $this->jenisoutputs->get_one($id);
            $this->template->render('jenisoutput/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/jenisoutput'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/jenisoutput/search/'), 'total_rows' => $this->jenisoutputs->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['jenisoutputs'] = $this->jenisoutputs->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('jenisoutput/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->jenisoutputs->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/jenisoutput'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/jenisoutput'));
        }
    }
}
?>