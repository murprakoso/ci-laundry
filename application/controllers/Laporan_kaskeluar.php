<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_kaskeluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // error_reporting(0);
        is_logged_in();
        // $this->load->model('Kaskluar_model', 'kasmasuk_model');
        $this->load->model('Rekap_model', 'rekap_model');
    }

    public function index()
    {
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_laporan_kaskeluar', $data);
    }

    public function cetak_per_bulan()
    {
        $this->load->library('dompdf_gen');

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['kaskeluar'] = $this->rekap_model->cariDataRekapKeluar($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('laporan/laporan_kas_keluar', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan_kas_keluar_perbulan.pdf", array('Attachment' => 0));
    }

    public function cetak_per_periode()
    {
        $this->load->library('dompdf_gen');

        $tglAwal = $this->input->post('tgl_awal');
        $tglAkhir = $this->input->post('tgl_akhir');

        $data['kaskeluar'] = $this->rekap_model->cariRekapKeluarPerPeriode($tglAwal, $tglAkhir);
        $data['tgl_awal'] = $tglAwal;
        $data['tgl_akhir'] = $tglAkhir;

        $this->load->view('laporan/laporan_kas_keluar', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan_kas_keluar_perperiode.pdf", array('Attachment' => 0));
    }
}

/* End of file Laporan_kaskeluar.php */
