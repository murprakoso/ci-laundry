<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        is_logged_in();
        $this->load->model('Kas_model', 'kas_model');
        $this->load->model('Rekap_model', 'rekap_model');
    }

    public function index()
    {
        $data['title'] = 'Kas Masuk';
        $data['kasmasuk'] = $this->kas_model->get_all_kasmasuk();
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_kas_masuk', $data);
    }

    public function tambah()
    {
        $banyaknya = htmlspecialchars($this->input->post('kas_banyaknya', TRUE), ENT_QUOTES);
        $keterangan = htmlspecialchars($this->input->post('kas_keterangan', TRUE), ENT_QUOTES);
        $kode = htmlspecialchars($this->input->post('kas_kode', TRUE), ENT_QUOTES);
        $total = htmlspecialchars($this->input->post('kas_total', TRUE), ENT_QUOTES);

        $data = [
            'kas_jenis' => 1,
            'kas_banyaknya' => $banyaknya,
            'kas_keterangan' => $keterangan,
            'kas_kode' => date('dmy') . '-' . $kode, //gabung kode dan tanggal
            'kas_total' => $total
        ];

        $this->kas_model->insert_kas($data);
        $this->_insertRekap();
        // $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        // redirect('kas-masuk');
    }

    public function ubah()
    {
        $kas_id = $this->input->post('kas_id', TRUE);
        $banyaknya = htmlspecialchars($this->input->post('kas_banyaknya', TRUE), ENT_QUOTES);
        $keterangan = htmlspecialchars($this->input->post('kas_keterangan', TRUE), ENT_QUOTES);
        $kode1 = htmlspecialchars($this->input->post('kode1', TRUE), ENT_QUOTES);
        $kode = htmlspecialchars($this->input->post('kas_kode', TRUE), ENT_QUOTES);
        $total = htmlspecialchars($this->input->post('kas_total', TRUE), ENT_QUOTES);

        $data = [
            'kas_jenis' => 1,
            'kas_banyaknya' => $banyaknya,
            'kas_keterangan' => $keterangan,
            'kas_kode' => $kode1 . '-' . $kode, //gabung kode dan tanggal dari database
            'kas_total' => $total,
        ];
        $this->kas_model->update_kas($data, $kas_id);
        $this->session->set_flashdata('success', 'Data berhasil diubah!');
        redirect('kas-masuk');
    }

    public function hapus($kas_id)
    {
        $this->kas_model->hapus_kas($kas_id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('kas-masuk');
    }

    // hapus data dari checkbox
    public function hapus_kas()
    {
        $kas_id = $this->input->post('kas_id', TRUE);
        if (!empty($kas_id)) {
            $this->kas_model->delete($kas_id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
            redirect('kas-masuk');
        } else {
            $this->session->set_flashdata('warning', 'Harap pilih data!');
            redirect('kas-masuk');
        }
    }

    // proses memasukan data ke rekap
    private function _insertRekap()
    {
        $banyaknya = htmlspecialchars($this->input->post('kas_banyaknya', TRUE), ENT_QUOTES);
        $keterangan = htmlspecialchars($this->input->post('kas_keterangan', TRUE), ENT_QUOTES);
        $kode = htmlspecialchars($this->input->post('kas_kode', TRUE), ENT_QUOTES);
        $total = htmlspecialchars($this->input->post('kas_total', TRUE), ENT_QUOTES);

        // select 'id terakhir' di tbl rekap
        $cekRekap = $this->rekap_model->cek_rekapmasuk()->row_array();
        $rekapID = $cekRekap['rekap_id'];

        // ambil data berdasarkan 'id terakhir'
        $rekap = $this->db->get_where('tbl_kas_rekap', ['rekap_id' => $rekapID])->row_array();
        // $rekap['rekap_total'];
        $rekap['rekap_debit'];

        if (!$rekapID) {
            $debit = $total;
        } else {
            $debit = $total + $rekap['rekap_debit'];
        }

        // 
        $data = [
            'rekap_jenis' => 1,
            'rekap_banyaknya' => $banyaknya,
            'rekap_keterangan' => $keterangan,
            'rekap_kode' => date('dmy') . '-' . $kode, //gabung kode dan tanggal
            'rekap_total' => $total,
            'rekap_debit' => $debit
        ];

        $this->rekap_model->insert_rekap($data);
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        redirect('kas-masuk');
    }
}

/* End of file Transaksi.php */
