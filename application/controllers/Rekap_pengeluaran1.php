<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_pengeluaran extends CI_Controller
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
        $data['rekappengeluaran'] = $this->rekap_model->get_all_rekapkeluar();
        if ($this->input->post('rekap_date')) {
            // pecah/explode bulan dan tahun
            $date = $this->input->post('rekap_date');
            $dKode = $date;
            $ex = explode('-', $dKode);
            $bulan = $ex[0];
            $tahun = $ex[1];
            // 
            $data['rekappengeluaran'] = $this->rekap_model->cari_data_rekapkeluar($bulan, $tahun);
        }

        $data['title'] = 'Rekap Pengeluaran Kas';
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_rekap_pengeluaran', $data);
    }


    public function hapus($rekap_id)
    {
        $this->rekap_model->hapus_rekap($rekap_id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('rekap-pengeluaran');
    }
    // hapus data dari checkbox
    public function hapus_rekap()
    {
        $rekap_id = $this->input->post('rekap_id', TRUE);
        if (!empty($rekap_id)) {
            $this->rekap_model->delete($rekap_id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
            redirect('rekap-pengeluaran');
        } else {
            $this->session->set_flashdata('warning', 'Harap pilih data!');
            redirect('rekap-pengeluaran');
        }
    }
}

/* End of file Rekap_pengeluaran.php */
