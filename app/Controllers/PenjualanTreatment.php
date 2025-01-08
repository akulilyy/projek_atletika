<?php

namespace App\Controllers;

use App\Models\JualTreatmentModel;

class PenjualanTreatment extends BaseController
{
    protected $jualTreatmentModel;

    public function __construct()
    {
        $this->jualTreatmentModel = new JualTreatmentModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Penjualan Treatment',
            'detail_treatment' => $this->jualTreatmentModel->getDetailTreatment($this->request->getGet('search')),
            'search' => $this->request->getGet('search')
        ];
        return view('penjualantreatment/jualtreatment', $data);
    }

    public function tambah()
    {
        $pelangganModel = new \App\Models\PelangganModel(); // Pastikan model ini ada
        $treatmentModel = new \App\Models\TreatmentModel(); // Pastikan model ini ada
        $dokterModel = new \App\Models\DokterModel();       // Pastikan model ini ada

        $data = [
            'title' => 'Tambah Penjualan Treatment',
            'pelanggan' => $pelangganModel->findAll(),
            'treatment' => $treatmentModel->findAll(),
            'dokter' => $dokterModel->findAll(),
        ];

        return view('penjualantreatment/form_tambah', $data);
    }


    public function save()
    {
        // Simpan data ke database
        $this->jualTreatmentModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_treatment' => $this->request->getPost('id_treatment'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'harga' =>  $this->request->getPost('harga'),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/penjualantreatment');
    }


    // public function savee()
    // {
    //     // Ambil dan proses harga untuk menghilangkan format
    //     $harga = str_replace(['Rp.', ' '], '', $this->request->getPost('harga')); // Hapus 'Rp.' dan spasi
    //     $harga = (int) $harga; // Ubah string menjadi integer

    //     // Validasi harga sebelum menyimpan
    //     if (empty($harga) || $harga <= 0) {
    //         session()->setFlashdata('error', 'Harga tidak valid.');
    //         return redirect()->back()->withInput();
    //     }

    //     // Simpan data ke database
    //     $this->jualTreatmentModel->save([
    //         'tanggal' => $this->request->getPost('tanggal'),
    //         'id_pelanggan' => $this->request->getPost('id_pelanggan'),
    //         'id_treatment' => $this->request->getPost('id_treatment'),
    //         'id_dokter' => $this->request->getPost('id_dokter'),
    //         'jam_mulai' => $this->request->getPost('jam_mulai'),
    //         'jam_selesai' => $this->request->getPost('jam_selesai'),
    //         'harga' => $harga, // Harga yang sudah diproses
    //     ]);

    //     session()->setFlashdata('success', 'Data berhasil ditambahkan.');
    //     return redirect()->to('/penjualantreatment');
    // }


    public function edit($id)
    {
        $jualTreatmentModel = new \App\Models\JualTreatmentModel();
        $pelangganModel = new \App\Models\PelangganModel();
        $treatmentModel = new \App\Models\TreatmentModel();
        $dokterModel = new \App\Models\DokterModel();

        $data = [
            'title' => 'Edit Penjualan Treatment',
            'detail' => $jualTreatmentModel->find($id), // Data detail treatment berdasarkan ID
            'pelanggan' => $pelangganModel->findAll(),  // Semua data pelanggan
            'treatment' => $treatmentModel->findAll(),  // Semua data treatment
            'dokter' => $dokterModel->findAll(),        // Semua data dokter
        ];

        return view('penjualantreatment/form_edit', $data);
    }

    public function update($id)
    {
        $this->jualTreatmentModel->update($id, [
            'tanggal' => $this->request->getPost('tanggal'),
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_treatment' => $this->request->getPost('id_treatment'),
            'id_dokter' => $this->request->getPost('id_dokter'),
            'jam_mulai' => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai'),
            'harga' => $this->request->getPost('harga')
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/penjualantreatment');
    }

    public function delete($id)
    {
        $this->jualTreatmentModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/penjualantreatment');
    }
}
