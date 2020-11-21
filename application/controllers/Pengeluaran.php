<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public $userId;
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        is_logged_in();
        $this->load->model('Kaskeluar_model', 'kaskeluar_model');

        // ambil session user
        if (!empty($this->session->userdata('user_name'))) {
            $this->userId = $this->session->userdata('user_id');
        } else {
            is_logged_in();
        }
    }


    public function index()
    {
        $data = [
            'title' => 'Transaksi Keluar',
            'content' => 'transaksi/v_pengeluaran'
        ];
        $data['kaskeluar'] = $this->kaskeluar_model->getKasKeluar();

        $this->load->view('layout/wrapper', $data);
    }

    /**
     * @method simpan
     */
    public function save()
    {
        try {
            $tanggal = htmlspecialchars($this->input->post('tanggal', TRUE), ENT_QUOTES);
            $banyaknya = htmlspecialchars($this->input->post('banyaknya', TRUE), ENT_QUOTES);
            $namaToko = htmlspecialchars($this->input->post('nama_toko', TRUE), ENT_QUOTES);
            $telp = htmlspecialchars($this->input->post('telp', TRUE), ENT_QUOTES);
            $keterangan = htmlspecialchars($this->input->post('keterangan', TRUE), ENT_QUOTES);
            $harga = htmlspecialchars($this->input->post('harga', TRUE), ENT_QUOTES);

            if ($this->kaskeluar_model->insertKas($this->userId, $tanggal, $banyaknya, $namaToko, $telp, $keterangan, $harga)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
            }
            redirect('pengeluaran');
        } catch (\Throwable $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('pengeluaran');
        }
    }

    /**
     * @method update data pengeluaran
     */
    public function update()
    {
        try {
            $kaskeluarId = $this->input->post('kas_id', TRUE);
            $tanggal = htmlspecialchars($this->input->post('tanggal', TRUE), ENT_QUOTES);
            $banyaknya = htmlspecialchars($this->input->post('banyaknya', TRUE), ENT_QUOTES);
            $namaToko = htmlspecialchars($this->input->post('nama_toko', TRUE), ENT_QUOTES);
            $telp = htmlspecialchars($this->input->post('telp', TRUE), ENT_QUOTES);
            $keterangan = htmlspecialchars($this->input->post('keterangan', TRUE), ENT_QUOTES);
            $harga = htmlspecialchars($this->input->post('harga', TRUE), ENT_QUOTES);

            if ($this->kaskeluar_model->updateKas($this->userId, $tanggal, $banyaknya, $namaToko, $telp, $keterangan, $harga, $kaskeluarId)) {
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
            }
        } catch (\Throwable $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }
        redirect('pengeluaran');
    }


    /**
     * @method hapus transaksi keluar
     */
    public function delete($kaskeluarId)
    {
        try {
            if ($this->kaskeluar_model->deleteKas($kaskeluarId)) {
                $this->session->set_flashdata('success', 'Data berhasil dihapus!');
            }
        } catch (\Throwable $e) {
            $this->session->set_flashdata('error', $e->getMessage());
        }
        redirect('pengeluaran');
    }

    /**
     * @method hapus multiple dengan checkbox
     */
    public function deletes()
    {
        try {
            $kaskeluarId = $this->input->post('kaskeluar_id', TRUE);
            if (!empty($kaskeluarId)) {
                if ($this->kaskeluar_model->deleteMultiple($kaskeluarId)) {
                    $this->session->set_flashdata('success', 'Data berhasil dihapus!');
                }
                redirect('pengeluaran');
            } else {
                $this->session->set_flashdata('warning', 'Harap pilih data!');
                redirect('pengeluaran');
            }
        } catch (\Throwable $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('pengeluaran');
        }
    }
}

/* End of file Pengeluaran.php */
