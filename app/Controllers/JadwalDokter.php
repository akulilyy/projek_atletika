<?php

namespace App\Controllers;

use App\Models\DokterModel;
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
        $search = $this->request->getGet('search');
        $jadwaldokterModel = new \App\Models\JadwalDokterModel();

        // Pencarian
        if ($search) {
            $jadwaldokter = $jadwaldokterModel->like('dokter.nama', $search)  // Cari berdasarkan nama dokter
                ->orLike('jadwal_dokter.tanggal', $search)
                ->orLike('jadwal_dokter.jam_praktik', $search)
                ->getJadwalWithDokter();  // Ambil data jadwal dengan nama dokter
        } else {
            $jadwaldokter = $jadwaldokterModel->getJadwalWithDokter();  // Ambil semua jadwal
        }


        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Jadwal Dokter',
            'jadwaldokter' => $jadwaldokter,
            'search' => $search, // Kirimkan data pencarian ke view
        ];

        // Memanggil view dan mengirim data
        echo view('jadwaldokter/jadwaldokter', $data);
    }

    public function tambah()
    {
        $dokterModel = new \App\Models\DokterModel(); // Pastikan model SupplierModel sudah ada
        $dokter = $dokterModel->findAll();  // Ambil semua data supplier
        //menambhakan form tambah pada folder
        $data = [
            'title' => 'Tambah Jadwal dokter',
            'dokter' => $dokter
        ];
        echo view('jadwaldokter/form_tambah', $data);
    }


    public function simpan()
    {
        // Ambil id_dokter dari form
        $id_dokter = $this->request->getPost('id_dokter');

        // Data yang akan disimpan
        $data = [
            'id_dokter' => $id_dokter,  // Menyimpan id_dokter
            'tanggal' => $this->request->getPost('tanggal'),
            'jam_praktik' => $this->request->getPost('jam_praktik'),
        ];

        // Simpan data ke jadwal_dokter
        if ($this->jadwaldokterModel->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->to(base_url('jadwaldokter'));
    }


    // public function simpan()
    // {
    //     // Ambil id_dokter dari form
    //     $id_dokter = $this->request->getPost('id_dokter');

    //     // Ambil nama dokter berdasarkan id_dokter
    //     $dokterModel = new DokterModel();  // Pastikan Anda sudah membuat model untuk tabel dokter
    //     $dokter = $dokterModel->find($id_dokter);
    //     $nama = $dokter ? $dokter['nama'] : ''; // Pastikan dokter ditemukan

    //     // Data yang akan disimpan
    //     $data = [
    //         'id_dokter' => $id_dokter,  // Menyimpan id_dokter
    //         'tanggal' => $this->request->getPost('tanggal'),
    //         'jam_praktik' => $this->request->getPost('jam_praktik'),
    //     ];

    //     // Simpan data ke jadwal_dokter
    //     if ($this->jadwaldokterModel->insert($data)) {
    //         session()->setFlashdata('success', 'Data berhasil disimpan.');
    //     } else {
    //         session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
    //     }

    //     return redirect()->to(base_url('jadwaldokter'));
    // }

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
