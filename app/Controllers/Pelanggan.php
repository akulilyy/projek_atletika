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
        $search = $this->request->getGet('search'); // Ambil input pencarian dari query string
        $pelangganModel = new \App\Models\PelangganModel(); // Pastikan Anda menggunakan model yang sesuai

        if ($search) {
            $pelanggan = $pelangganModel->like('nama', $search)
                ->orLike('jenis_kelamin', $search)
                ->findAll();
        } else {
            $pelanggan = $pelangganModel->findAll();
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Pelanggan',
            'pelanggan' => $pelanggan,
            'search' => $search, // Kirimkan data pencarian ke view
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
        $this->pelangganModel->save([
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin'          => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'alamat'        => $this->request->getPost('alamat'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('pelanggan');
    }

    public function edit($id_pel)
    {
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
