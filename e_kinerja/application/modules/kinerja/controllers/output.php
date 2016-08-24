<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller output
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class output extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('outputs');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/output/index/'), 'total_rows' => $this->outputs->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['outputs'] = $this->outputs->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('output/view', $data);
    }
    public function add() {
        $data['output'] = $this->outputs->add();
        $data['action'] = 'output/save';
        
        $data['indikatorkinerjakegiatan'] = $this->outputs->get_indikatorkinerjakegiatan();
        $data['unoreselon3'] = $this->outputs->get_unoreselon3();
        $data['jenisoutput'] = $this->outputs->get_jenisoutput();   
        $this->template->js_add('$(document).ready(func()$("#form_output").parsley())', 'embed');
        $this->template->render('output/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['output'] = $this->outputs->get_one($id);
            $data['action'] = 'output/save/' . $id;
            
        $data['indikatorkinerjakegiatan'] = $this->outputs->get_indikatorkinerjakegiatan();
        $data['unoreselon3'] = $this->outputs->get_unoreselon3();
        $data['jenisoutput'] = $this->outputs->get_jenisoutput();   
            $this->template->js_add('$(document).ready(func()$("#form_output").parsley())', 'embed');
            $this->template->render('output/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/output'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'indikatorkinerjakegiatan_id', 'label' => 'Indikator Kinerja Kegiatan (IKK)', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'unoreselon3_id', 'label' => 'Unit Es.III', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'output', 'label' => 'Output', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'jenisoutput_id', 'label' => 'Jenis Output', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'output', 'label' => 'Output', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->outputs->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/output'));
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
                    $this->outputs->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/output'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['output'] = $this->outputs->get_one($id);
            $this->template->render('output/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/output'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/output/search/'), 'total_rows' => $this->outputs->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['outputs'] = $this->outputs->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('output/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->outputs->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/output'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/output'));
        }
    }
}
?>