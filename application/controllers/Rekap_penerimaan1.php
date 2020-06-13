<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_penerimaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        is_logged_in();
        is_admin();
        $this->load->model('Rekap_model', 'rekap_model');
    }

    public function index()
    {
        $data['rekappenerimaan'] = $this->rekap_model->get_all_rekapmasuk();
        if ($this->input->post('rekap_date')) {
            // pecah/explode bulan dan tahun
            $date = $this->input->post('rekap_date');
            $dKode = $date;
            $ex = explode('-', $dKode);
            $bulan = $ex[0];
            $tahun = $ex[1];
            // 
            $data['rekappenerimaan'] = $this->rekap_model->cari_data_rekapmasuk($bulan, $tahun);
        }
        $data['title'] = 'Rekap Penerimaan Kas';
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_rekap_penerimaan', $data);
    }


    public function hapus($rekap_id)
    {
        $this->rekap_model->hapus_rekap($rekap_id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('rekap-penerimaan');
    }
    // hapus data dari checkbox
    public function hapus_rekap()
    {
        $rekap_id = $this->input->post('rekap_id', TRUE);
        if (!empty($rekap_id)) {
            $this->rekap_model->delete($rekap_id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
            redirect('rekap-penerimaan');
        } else {
            $this->session->set_flashdata('warning', 'Harap pilih data!');
            redirect('rekap-penerimaan');
        }
    }
}

/* End of file Rekap_penerimaan.php */
