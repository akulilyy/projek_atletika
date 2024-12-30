<?php

namespace App\Controllers;

use App\Models\JadwalDokterModel;

class JadwalDokter extends BaseController
{
    protected $jadwaldokterModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->jadwaldokterModel = new JadwalDokterModel();
    }

    public function index()
    {
        // Mengambil semua data 
        $jadwaldokter = $this->jadwaldokterModel->findAll();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Jadwal Dokter',
            'jadwaldokter' => $jadwaldokter
        ];

        // Memanggil view dan mengirim data
        echo view('jadwaldokter/jadwaldokter', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder jadwal_dokter
        $data = [
            'title' => 'Tambah Jadwal Dokter',
        ];
        echo view('jadwaldokter/form_tambah', $data);
    }

    public function simpan()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'tanggal' => $this->request->getPost('tanggal_lahir'),
            'jam_praktik' => $this->request->getPost('no_hp'),
        ];

        if ($this->jadwaldokterModel->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->to(base_url('jadwaldokter'));
    }


    public function edit($id_jadwal)
    {
        $jadwaldokter = $this->jadwaldokterModel->find($id_jadwal);
        $data = [
            'title' => 'Edit Jadwal Dokter',
            'jadwaldokter' => $jadwaldokter
        ];
        echo view('jadwaldokter/form_edit', $data);
    }

    public function update()
    {
        $id_jadwal = $this->request->getVar('id_jadwaldokter');
        $data = [
            'nama'               => $this->request->getVar('nama'),
            'tanggal'            => $this->request->getVar('tanggal_'),
            'jam_praktik'        => $this->request->getVar('jadwal_praktik'),
        ];
        $this->jadwaldokterModel->update($id_jadwal, $data);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('jadwaldokter');
    }

    public function delete($id_jadwal)
    {
        $this->jadwaldokterModel->delete($id_jadwal);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('jadwaldokter');
    }
}
