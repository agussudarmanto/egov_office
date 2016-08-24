<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller sasaranstrategis
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class sasaranstrategis extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('sasaranstrategiss');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/sasaranstrategis/index/'), 'total_rows' => $this->sasaranstrategiss->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['sasaranstrategiss'] = $this->sasaranstrategiss->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('sasaranstrategis/view', $data);
    }
    public function add() {
        $data['sasaranstrategis'] = $this->sasaranstrategiss->add();
        $data['action'] = 'sasaranstrategis/save';
        
        $data['unoreselon1'] = $this->sasaranstrategiss->get_unoreselon1();   
        $this->template->js_add('$(document).ready(func()$("#form_sasaranstrategis").parsley())', 'embed');
        $this->template->render('sasaranstrategis/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['sasaranstrategis'] = $this->sasaranstrategiss->get_one($id);
            $data['action'] = 'sasaranstrategis/save/' . $id;
            
        $data['unoreselon1'] = $this->sasaranstrategiss->get_unoreselon1();   
            $this->template->js_add('$(document).ready(func()$("#form_sasaranstrategis").parsley())', 'embed');
            $this->template->render('sasaranstrategis/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/sasaranstrategis'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'unoreselon1_id', 'label' => 'Unit Es.I', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'sasaranstrategis', 'label' => 'Sasaran Strategis Es.I', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->sasaranstrategiss->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/sasaranstrategis'));
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
                    $this->sasaranstrategiss->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/sasaranstrategis'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['sasaranstrategis'] = $this->sasaranstrategiss->get_one($id);
            $this->template->render('sasaranstrategis/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/sasaranstrategis'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/sasaranstrategis/search/'), 'total_rows' => $this->sasaranstrategiss->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['sasaranstrategiss'] = $this->sasaranstrategiss->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('sasaranstrategis/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->sasaranstrategiss->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/sasaranstrategis'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/sasaranstrategis'));
        }
    }
}
?>