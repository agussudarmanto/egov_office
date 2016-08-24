<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller ikstriwulan
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class ikstriwulan extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('ikstriwulans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/ikstriwulan/index/'), 'total_rows' => $this->ikstriwulans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['ikstriwulans'] = $this->ikstriwulans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('ikstriwulan/view', $data);
    }
    public function add() {
        $data['ikstriwulan'] = $this->ikstriwulans->add();
        $data['action'] = 'ikstriwulan/save';
        
        $data['indikatorkinerjasasaran'] = $this->ikstriwulans->get_indikatorkinerjasasaran();
        $data['triwulan'] = $this->ikstriwulans->get_triwulan();   
        $this->template->js_add('$(document).ready(func()$("#form_ikstriwulan").parsley())', 'embed');
        $this->template->render('ikstriwulan/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['ikstriwulan'] = $this->ikstriwulans->get_one($id);
            $data['action'] = 'ikstriwulan/save/' . $id;
            
        $data['indikatorkinerjasasaran'] = $this->ikstriwulans->get_indikatorkinerjasasaran();
        $data['triwulan'] = $this->ikstriwulans->get_triwulan();   
            $this->template->js_add('$(document).ready(func()$("#form_ikstriwulan").parsley())', 'embed');
            $this->template->render('ikstriwulan/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/ikstriwulan'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'indikatorkinerjasasaran_id', 'label' => '(IKS) Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'tahun', 'label' => 'Tahun', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'triwulan_id', 'label' => 'Triwulan', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'target', 'label' => 'Target', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'realisasi', 'label' => 'Realisasi', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'analisiscapaian', 'label' => 'Analisis Capaian', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'faktorkeberhasilan', 'label' => 'Faktor Keberhasilan', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'faktorkegagalan', 'label' => 'Faktor Kegagalan', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'solusi', 'label' => 'Solusi', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'sumberdaya', 'label' => 'Sumber Daya', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kegiatanpenunjang', 'label' => 'Kegiatan Penunjang', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->ikstriwulans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/ikstriwulan'));
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
                    $this->ikstriwulans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/ikstriwulan'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['ikstriwulan'] = $this->ikstriwulans->get_one($id);
            $this->template->render('ikstriwulan/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/ikstriwulan'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/ikstriwulan/search/'), 'total_rows' => $this->ikstriwulans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['ikstriwulans'] = $this->ikstriwulans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('ikstriwulan/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->ikstriwulans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/ikstriwulan'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/ikstriwulan'));
        }
    }
}
?>