<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller indikatorkinerjasasaran
 * @created on : Tuesday, 07-Apr-2015 05:01:50
 * @author AGUS SUDARMANTO <agus.sudarmanto@gmail.com>
 * Copyright 2015
 *
 *
 */

class indikatorkinerjasasaran extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('indikatorkinerjasasarans');
    }
    public function index() {
        $config = array('base_url' => site_url('kinerja/indikatorkinerjasasaran/index/'), 'total_rows' => $this->indikatorkinerjasasarans->count_all(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['number'] = $this->uri->segment(3) + 1;
        $data['indikatorkinerjasasarans'] = $this->indikatorkinerjasasarans->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('indikatorkinerjasasaran/view', $data);
    }

    
    public function kinerja() {
        $this->db->select("
                kegiatan.id AS kegiatan_id, kegiatan.kode AS kegiatan_kode, kegiatan.kegiatan,
                sasaran.id AS sasaran_id, sasaran.kode AS sasaran_kode, sasaran.sasaran,
                indikatorkinerjakegiatan.id AS indikatorkinerjakegiatan_id, indikatorkinerjakegiatan.kode AS indikatorkinerjakegiatan_kode, indikatorkinerjakegiatan.indikatorkinerjakegiatan AS indikatorkinerjakegiatan,
                output.id AS output_id, output.kode AS output_kode, output.output AS output,
                indikatorkinerjasasaran.id AS indikatorkinerjasasaran_id, indikatorkinerjasasaran.kode AS indikatorkinerjasasaran_kode, indikatorkinerjasasaran.indikatorkinerjasasaran AS indikatorkinerjasasaran
            FROM 
                kegiatan 
                LEFT JOIN sasaran ON (sasaran.kegiatan_id = kegiatan.id)
                LEFT JOIN indikatorkinerjakegiatan ON (indikatorkinerjakegiatan.sasaran_id = sasaran.id)
                LEFT JOIN output ON (output.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id)
                LEFT JOIN indikatorkinerjasasaran ON (indikatorkinerjasasaran.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id)
            ORDER BY 
                kegiatan.id
            ");
        $data['sasarans'] = $this->db->get()->result_array();

        $result = $this->db->get('kegiatan')->result();
        $data['kegiatan'][] = 'Pilih kegiatan:';
        foreach ($result as $key => $row) { $data['kegiatan'][$row->id] = $row->kegiatan; }

        $result = $this->db->get('sasaran')->result();
        $data['sasaran'][] = 'Pilih sasaran:';
        foreach ($result as $key => $row) { $data['sasaran'][$row->id] = $row->sasaran; }

        $result = $this->db->get('indikatorkinerjakegiatan')->result();
        $data['indikatorkinerjakegiatan'][] = 'Pilih indikator kinerja kegiatan:';
        foreach ($result as $key => $row) { $data['indikatorkinerjakegiatan'][$row->id] = $row->indikatorkinerjakegiatan; }

        $data['target']['target'] = '';
        $data['realisasi']['realisasi'] = '';
        $data['analisiscapaian']['analisiscapaian'] = '';
        $data['faktorkeberhasilan']['faktorkeberhasilan'] = '';
        $data['faktorkegagalan']['faktorkegagalan'] = '';
        $data['solusi']['solusi'] = '';
        $data['sumberdaya']['sumberdaya'] = '';
        $data['kegiatanpenunjang']['kegiatanpenunjang'] = '';

        /*$result = $this->db->select('ikstriwulan.*, triwulan.triwulan')
                 ->join('triwulan', 'ikstriwulan.triwulan_id = triwulan.id', 'LEFT')
                 ->from('ikstriwulan')
                 ->where('ikstriwulan.id', 1)
                 ->get()->result_array();
        $result = $this->db->from('ikstriwulan')->where('id', 1)->get()->result_array();
        $data['triwulan'] = $result[0];

        $script = "
          $(document).ready(function() {
            $('.summernote').summernote({height: 150, minHeight: null, maxHeight: null, focus: true});
          });
        ";

        $this->template->js_add('assets/js/summernote.min.js');
        $this->template->js_add($script, 'embed');

*/
        $this->template->render('indikatorkinerjasasaran/kinerja', $data);
    }

    public function showiks($id) {
        if ($id != '') {
            // load indikator kinerja sasaran
            $this->db->select("
                    kegiatan.id AS kegiatan_id, kegiatan.kode AS kegiatan_kode, kegiatan.kegiatan,
                    sasaran.id AS sasaran_id, sasaran.kode AS sasaran_kode, sasaran.sasaran,
                    indikatorkinerjakegiatan.id AS indikatorkinerjakegiatan_id, indikatorkinerjakegiatan.kode AS indikatorkinerjakegiatan_kode, indikatorkinerjakegiatan.indikatorkinerjakegiatan AS indikatorkinerjakegiatan,
                    output.id AS output_id, output.kode AS output_kode, output.output AS output,
                    indikatorkinerjasasaran.id AS indikatorkinerjasasaran_id, indikatorkinerjasasaran.kode AS indikatorkinerjasasaran_kode, indikatorkinerjasasaran.indikatorkinerjasasaran AS indikatorkinerjasasaran")
                ->join('sasaran',                   'sasaran.kegiatan_id = kegiatan.id', 'LEFT')
                ->join('indikatorkinerjakegiatan',  'indikatorkinerjakegiatan.sasaran_id = sasaran.id', 'LEFT')
                ->join('output',                    'output.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT')
                ->join('indikatorkinerjasasaran',   'indikatorkinerjasasaran.indikatorkinerjakegiatan_id = indikatorkinerjakegiatan.id', 'LEFT')
                ->from('kegiatan')
                ->where('indikatorkinerjasasaran.id', $id);
            $result = $this->db->get()->result_array();
            $data['indikatorkinerjasasaran'] = $result[0];

            $script = "
                $(document).ready(function() {
                    var tabID = '';
                    $('.summernote').summernote({height: 150, minHeight: null, maxHeight: null, focus: true});
                    $('#tabstrip a').click(function (e) {
                        e.preventDefault();
                        tabID = $(this).attr('href').substr(1);
                        $('.tab-pane').each(function () {
                           $(this).empty();
                        });
                        $('#tabstrip li, #tabdata div').each(function () {
                           $(this).removeClass('active');
                        });
                        $.ajax({
                            url: '".site_url('kinerja/indikatorkinerjasasaran/showikstriwulan/'.$id.'/')."/' + tabID.substr(-1) + '/',
                            cache: false,
                            type: 'get',
                            dataType: 'html',
                            success: function (result) {
                                $('#' + tabID).html(result);
                                $('#tabstrip a[href=\"#'+tabID+'\"]').parent().addClass('active');
                                $('#' + tabID).addClass('active');
                            }
                        });
                    });
                });
            ";

            $this->template->js_add('assets/js/summernote.min.js');
            $this->template->js_add($script, 'embed');
            $this->template->render('indikatorkinerjasasaran/show_iks', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }

    public function showikstriwulan($id, $twid) {
        if ($id != '') {
            $result = $this->db->from('ikstriwulan')
                ->where('indikatorkinerjasasaran_id', $id)
                ->where('triwulan_id', $twid)
                ->get();

            if ($result->num_rows() > 0) {
                $data['triwulan'] = $result->row_array();
            } else {
                $data['triwulan'] = array();
            }

            $this->load->view('indikatorkinerjasasaran/show_triwulan', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }       
    }

    public function editikstriwulan($id, $twid) {
        if ($id != '') {
            $result = $this->db->from('ikstriwulan')
                ->where('indikatorkinerjasasaran_id', $id)
                ->where('triwulan_id', $twid)
                ->get()->result_array();
            //echo $this->db->last_query();
            $data['triwulan'] = $result[0];

            $this->load->view('indikatorkinerjasasaran/edit_triwulan', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }       
    }





    public function add() {
        $data['indikatorkinerjasasaran'] = $this->indikatorkinerjasasarans->add();
        $data['action'] = 'indikatorkinerjasasaran/save';
        
        $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjasasarans->get_indikatorkinerjakegiatan();
        $data['unoreselon3'] = $this->indikatorkinerjasasarans->get_unoreselon3();
        $data['prioritas'] = $this->indikatorkinerjasasarans->get_prioritas();   
        $this->template->js_add('$(document).ready(func()$("#form_indikatorkinerjasasaran").parsley())', 'embed');
        $this->template->render('indikatorkinerjasasaran/form', $data);
    }
    public function edit($id = '') {
        if ($id != '') {
            $data['indikatorkinerjasasaran'] = $this->indikatorkinerjasasarans->get_one($id);
            $data['action'] = 'indikatorkinerjasasaran/save/' . $id;
            
        $data['indikatorkinerjakegiatan'] = $this->indikatorkinerjasasarans->get_indikatorkinerjakegiatan();
        $data['unoreselon3'] = $this->indikatorkinerjasasarans->get_unoreselon3();
        $data['prioritas'] = $this->indikatorkinerjasasarans->get_prioritas();   
            $this->template->js_add('$(document).ready(func()$("#form_indikatorkinerjasasaran").parsley())', 'embed');
            $this->template->render('indikatorkinerjasasaran/form', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }
    public function save($id = '') {
        
        $config = array(
          array('field' => 'indikatorkinerjakegiatan_id', 'label' => '(IKK) Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'unoreselon3_id', 'label' => 'Unit Es.III', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'kode', 'label' => 'Kode IKS Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'indikatorkinerjasasaran', 'label' => 'IKS Es.II', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'satuan', 'label' => 'Satuan', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'deskripsi', 'label' => 'Deskripsi IKS', 'rules' => 'trim|xss_clean|required'),
          array('field' => 'prioritas_id', 'label' => 'Prioritas Es.II', 'rules' => 'trim|xss_clean|required'),   
        );
        if (!$id) {
            $this->form_validation->set_rules($config);
            if (($this->form_validation->run() == TRUE)) {
                if (($this->input->post())) {
                    $this->indikatorkinerjasasarans->save();
                    $this->session->set_flashdata('notify', notify('Data berhasil di simpan', 'success'));
                    redirect(site_url('kinerja/indikatorkinerjasasaran'));
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
                    $this->indikatorkinerjasasarans->update($id);
                    $this->session->set_flashdata('notify', notify('Data berhasil di update', 'success'));
                    redirect(site_url('kinerja/indikatorkinerjasasaran'));
                }
            } 
            else {
                $this->edit($id);
            }
        }
    }
    public function show($id = '') {
        if ($id != '') {
            $data['indikatorkinerjasasaran'] = $this->indikatorkinerjasasarans->get_one($id);
            $this->template->render('indikatorkinerjasasaran/show', $data);
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'info'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }
    public function search() {
        if ($this->input->post('q')) {
            $keyword = $this->input->post('q');
            $this->session->set_userdata(array('keyword' => $this->input->post('q', TRUE)));
        }
        $config = array('base_url' => site_url('kinerja/indikatorkinerjasasaran/search/'), 'total_rows' => $this->indikatorkinerjasasarans->count_all_search(), 'per_page' => $this->config->item('per_page'), 'uri_segment' => 3, 'num_links' => 9, 'use_page_numbers' => FALSE);
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['number'] = $this->uri->segment(3) + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['indikatorkinerjasasarans'] = $this->indikatorkinerjasasarans->get_search($config['per_page'], $this->uri->segment(3));
        $this->template->render('indikatorkinerjasasaran/view', $data);
    }
    public function destroy($id) {
        if ($id) {
            $this->indikatorkinerjasasarans->destroy($id);
            $this->session->set_flashdata('notify', notify('Data berhasil di hapus', 'success'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        } 
        else {
            $this->session->set_flashdata('notify', notify('Data tidak ditemukan', 'warning'));
            redirect(site_url('kinerja/indikatorkinerjasasaran'));
        }
    }
}
?>