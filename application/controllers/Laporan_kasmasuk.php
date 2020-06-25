<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_kasmasuk extends CI_Controller
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
		$data = [
			'title' => 'Laporan Kas Masuk',
			'content' => 'laporan/v_laporan_kasmasuk'
		];
		$this->load->view('layout/wrapper', $data);
	}

	// **
	// * fungsi cetak laporan
	// *

	public function cetak_per_bulan()
	{
		$this->load->library('dompdf_gen');

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data['kasmasuk'] = $this->rekap_model->cariDataRekapMasuk($bulan, $tahun);
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;

		$this->load->view('laporan/export/laporan_kas_masuk', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		ob_end_clean();
		$this->dompdf->stream("laporan_kas_masuk_perbulan.pdf", array('Attachment' => 0));
	}


	public function cetak_per_periode()
	{
		$this->load->library('dompdf_gen');

		$tglAwal = $this->input->post('tgl_awal');
		$tglAkhir = $this->input->post('tgl_akhir');

		$data['kasmasuk'] = $this->rekap_model->cariRekapMasukPerPeriode($tglAwal, $tglAkhir);
		$data['tgl_awal'] = $tglAwal;
		$data['tgl_akhir'] = $tglAkhir;

		$this->load->view('laporan/export/laporan_kas_masuk', $data);

		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		ob_end_clean();
		$this->dompdf->stream("laporan_kas_masuk_perperiode.pdf", array('Attachment' => 0));
	}
}

/* End of file Laporan_kasmasuk.php */
