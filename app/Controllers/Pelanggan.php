<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->pelangganModel = new PelangganModel();
    }

    public function index()
    {
        // Mengambil semua data 
        $pelanggan = $this->pelangganModel->findAll();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Pelanggan',
            'pelanggan' => $pelanggan
        ];

        // Memanggil view dan mengirim data
        echo view('pelanggan/datapelanggan', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data Pelanggan',
        ];
        echo view('pelanggan/form_tambah', $data);
    }

    public function simpan()
    {

        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('dokter');
    }

    public function edit($id_pel)
    {
        $id_pel = $this->request->getVar('id_pelanggan');
        $data = [
            'nama'               => $this->request->getVar('nama'),
            'jenis_kelamin'      => $this->request->getVar('jenis_kelamin'),
            'tanggal_lahir'      => $this->request->getVar('tanggal_lahir'),
            'no_hp'              => $this->request->getVar('no_hp'),
            'alamat'             => $this->request->getVar('alamat'),
        ];
        $pelanggan = $this->pelangganModel->data_pel($id_pel);
        $data = [
            'title' => 'Edit Data Pelanggan',
            'pelanggan' => $pelanggan
        ];
        echo view('pelanggan/form_edit', $data);
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
        $this->pelangganModel->update_data($data, $id_pel);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('pelanggan');
    }

    public function delete($id_pel)
    {
        $this->pelangganModel->delete_data($id_pel);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('pelanggan');
    }
}