<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller misi
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class misi extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('misis');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/misi/index/'), 'total_rows' => $this->misis->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['misis'] = $this->misis->get_all($config['per_page'], $this->uri->segment(3));

        $data['misi'] = $this->misis->add();
        $data['unoreselon1'] = $this->misis->get_unoreselon1(); 

        $this->template->render('misi/view', $data);
    }
    public function add() {
        $data['misi'] = $this->misis->add();
        $data['action'] = 'misi/save';
        
        $data['unoreselon1'] = $this->misis->get_unoreselon1();   
        $this->template->js_add('$(document).ready(func()$("#form_misi").parsley())', 'embed');
        $this->template->render('misi/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['misi'] = $this->misis->get_one($id);
            $data['action'] = 'misi/save/' . $id;
            
        $data['unoreselon1'] = $this->misis->get_unoreselon1();   
            $this->template->js_add('$(document).ready(func()$("#form_misi").parsley())', 'embed');
            $this->template->render('misi/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/misi'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'unoreselon1_id', 'label' => 'Unit Es.I', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'misi', 'label' => 'Misi', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->misis->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/misi'));
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
                    $this->misis->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/misi'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['misi'] = $this->misis->get_one($id);
            $this->template->render('misi/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/misi'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/misi/search/'), 'total_rows' => $this->misis->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['misis'] = $this->misis->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('misi/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->misis->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/misi'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/misi'));
        }
    }
}
?>