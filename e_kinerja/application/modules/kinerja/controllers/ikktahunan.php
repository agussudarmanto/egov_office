<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller ikktahunan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class ikktahunan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('ikktahunans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/ikktahunan/index/'), 'total_rows' => $this->ikktahunans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['ikktahunans'] = $this->ikktahunans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('ikktahunan/view', $data);
    }
    public function add() {
        $data['ikktahunan'] = $this->ikktahunans->add();
        $data['action'] = 'ikktahunan/save';
        
        $data['indikatorkinerjakegiatan'] = $this->ikktahunans->get_indikatorkinerjakegiatan();   
        $this->template->js_add('$(document).ready(func()$("#form_ikktahunan").parsley())', 'embed');
        $this->template->render('ikktahunan/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['ikktahunan'] = $this->ikktahunans->get_one($id);
            $data['action'] = 'ikktahunan/save/' . $id;
            
        $data['indikatorkinerjakegiatan'] = $this->ikktahunans->get_indikatorkinerjakegiatan();   
            $this->template->js_add('$(document).ready(func()$("#form_ikktahunan").parsley())', 'embed');
            $this->template->render('ikktahunan/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/ikktahunan'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'indikatorkinerjakegiatan_id', 'label' => '(IKK) Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'tahun', 'label' => 'Tahun', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'nilai', 'label' => 'Target', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->ikktahunans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/ikktahunan'));
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
                    $this->ikktahunans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/ikktahunan'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['ikktahunan'] = $this->ikktahunans->get_one($id);
            $this->template->render('ikktahunan/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/ikktahunan'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/ikktahunan/search/'), 'total_rows' => $this->ikktahunans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['ikktahunans'] = $this->ikktahunans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('ikktahunan/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->ikktahunans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/ikktahunan'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/ikktahunan'));
        }
    }
}
?>