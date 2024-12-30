<?php

namespace App\Controllers;

use App\Models\DokterModel;

class Dokter extends BaseController
{
    protected $dokterModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {
        // Mengambil semua data 
        $dokter = $this->dokterModel->findAll();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Dokter',
            'dokter' => $dokter
        ];

        // Memanggil view dan mengirim data
        echo view('dokter/datadokter', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data Dokter',
        ];
        echo view('dokter/form_tambah', $data);
    }

    public function simpan()
    {
        $kode_dok = $this->request->getVar('kode_dok');

        $existingData = $this->dokterModel->where('kode_dok', $kode_dok)->first();

        if ($existingData) {
            session()->setFlashdata('error', 'Data sudah ada. Gunakan kode yang berbeda.');
            return redirect()->back()->withInput();
        }
        if (empty($kode_dok) || empty('nama') || empty('jenis_kelamin') || empty('tanggal_lahir') || empty('no_hp') || empty('alamat')) {
            session()->setFlashdata('error', 'Semua field wajib diisi.');
            return redirect()->back()->withInput();
        }
        $this->dokterModel->save([
            'kode_dok'           => $kode_dok,
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin'          => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'alamat'        => $this->request->getPost('alamat'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('dokter');
    }

    public function edit($id_dok)
    {
        $dokter = $this->dokterModel->data_dok($id_dok);
        $data = [
            'title' => 'Edit Data Dokter',
            'dokter' => $dokter
        ];
        echo view('dokter/form_edit', $data);
    }

    public function update()
    {
        $id_dok = $this->request->getVar('id_dokter');
        $data = [
            'kode_dok'           => $this->request->getVar('kode_dok'),
            'nama'               => $this->request->getVar('nama'),
            'jenis_kelamin'      => $this->request->getVar('jenis_kelamin'),
            'tanggal_lahir'      => $this->request->getVar('tanggal_lahir'),
            'no_hp'              => $this->request->getVar('no_hp'),
            'alamat'             => $this->request->getVar('alamat'),
        ];
        $this->dokterModel->update_data($data, $id_dok);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('dokter');
    }

    public function delete($id_dok)
    {
        $this->dokterModel->delete_data($id_dok);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('dokter');
    }
}
