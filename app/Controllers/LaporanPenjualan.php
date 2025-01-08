<?php

namespace App\Controllers;

use App\Models\LaporanPenjualanModel;

class LaporanPenjualan extends BaseController
{

    protected $laporanpenjualanModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->laporanpenjualanModel = new LaporanPenjualanModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search'); // Ambil input pencarian dari query string
        $laporanpenjualanModel = new \App\Models\LaporanPenjualanModel(); // Pastikan Anda menggunakan model yang sesuai

        if ($search) {
            $laporan = $laporanpenjualanModel->like('nama', $search)
                ->orLike('jenis_kelamin', $search)
                ->findAll();
        } else {
            $laporan = $laporanpenjualanModel->findAll();
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Laporan Penjualan',
            'laporan' => $laporan,
            'search' => $search, // Kirimkan data pencarian ke view
            'penjualan' => $this->laporanpenjualanModel->getCombinedData(), // Ambil data gabungan
        ];

        // Memanggil view dan mengirim data
        echo view('laporanpenjualan/laporanpenjualan', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data',
        ];
        echo view('laporanpenjualan/form_tambah', $data);
    }

    public function simpan()
    {
        $this->laporanpenjualanModel->save([
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin'          => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'alamat'        => $this->request->getPost('alamat'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('laporanpenjualan');
    }

    public function edit($id_pel)
    {
        $pelanggan = $this->laporanpenjualanModel->data_pel($id_pel);
        $data = [
            'title' => 'Edit Data Pelanggan',
            'pelanggan' => $pelanggan
        ];
        echo view('laporanpenjualan/form_edit', $data);
    }
    public function update()
    {
        $id_pel = $this->request->getVar('id_pelanggan');
        $data = [
            'nama'               => $this->request->getVar('nama'),
            'jenis_kelamin'      => $this->request->getVar('jenis_kelamin'),
            'tanggal_lahir'      => $this->request->getVar('tanggal_lahir'),
            'no_hp'              => $this->request->getVar('no_hp'),
            'alamat'             => $this->request->getVar('alamat'),
        ];
        $this->laporanpenjualanModel->update_data($data, $id_pel);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('laporanpenjualan');
    }

    public function delete($id_pel)
    {
        $this->laporanpenjualanModel->delete_data($id_pel);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('laporanpenjualan');
    }
}
