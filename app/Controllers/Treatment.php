<?php

namespace App\Controllers;

use App\Models\TreatmentModel;

class Treatment extends BaseController
{
    protected $treatmentModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->treatmentModel = new TreatmentModel();
    }

    public function index()
    {
        // Mengambil semua data 
        $treatment = $this->treatmentModel->findAll();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Treatment',
            'treatment' => $treatment
        ];

        // Memanggil view dan mengirim data
        echo view('treatment/datatreatment', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data Treatment',
        ];
        echo view('treatment/form_tambah', $data);
    }

    public function simpan()
    {
        $kode_tre = $this->request->getVar('kode_tre');

        $existingData = $this->treatmentModel->where('kode_tre', $kode_tre)->first();

        if ($existingData) {
            session()->setFlashdata('error', 'Data sudah ada. Gunakan kode yang berbeda.');
            return redirect()->back()->withInput();
        }
        if (empty($kode_tre) || empty('nama') || empty('diskon') || empty('harga')) {
            session()->setFlashdata('error', 'Semua field wajib diisi.');
            return redirect()->back()->withInput();
        }
        $this->treatmentModel->save([
            'kode_tre'           => $kode_tre,
            'nama'          => $this->request->getVar('nama'),
            'diskon'          => $this->request->getVar('diskon'),
            'harga'          => $this->request->getVar('harga'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('treatment');
    }

    public function edit($id_treatment)
    {
        $treatment = $this->treatmentModel->data_treatment($id_treatment);
        $data = [
            'title' => 'Edit Data Treatment',
            'treatment' => $treatment
        ];
        echo view('treatment/form_edit', $data);
    }

    public function update()
    {
        $id_treatment = $this->request->getVar('id_treatment');
        $data = [
            'kode_tre'           => $this->request->getVar('kode_tre'),
            'nama'               => $this->request->getVar('nama'),
            'diskon'             => $this->request->getVar('diskon'),
            'harga'              => $this->request->getVar('harga'),
        ];
        $this->treatmentModel->update_data($data, $id_treatment);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('treatment');
    }

    public function delete($id_treatment)
    {
        $this->treatmentModel->delete_data($id_treatment);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('treatment');
    }
}
