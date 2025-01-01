<?php

namespace App\Controllers;

use App\Models\jualTreatmentModel;

class PenjualanTreatment extends BaseController
{
    protected $jualtreatmentModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->jualtreatmentModel = new jualTreatmentModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search'); // Ambil input pencarian dari query string
        $jualtreatmentModel = new \App\Models\jualTreatmentModel(); // Pastikan Anda menggunakan model yang sesuai

        if ($search) {
            $jualtreatment = $jualtreatmentModel->like('nama', $search)
                ->orLike('', $search)
                ->findAll();
        } else {
            $jualtreatment = $jualtreatmentModel->findAll();
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Penjualan Treatment',
            'jualtreatment' => $jualtreatment,
            'search' => $search, // Kirimkan data pencarian ke view
        ];

        // Memanggil view dan mengirim data
        echo view('penjualantreatment/jualtreatment', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Penjualan Treatment',
        ];
        echo view('penjualantreatment/form_tambah', $data);
    }

    public function simpan()
    {
        $this->jualtreatmentModel->save([
            'tanggal'          => $this->request->getPost('tanggal'),
            'nama'          => $this->request->getPost('nama'),
            'qty'          => $this->request->getPost('qty'),
            'harga_satuan'         => $this->request->getPost('harga_satuan'),
            'subtotal'        => $this->request->getPost('subtotal'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('penjualantreatment');
    }

    public function edit($id_jutre)
    {
        $jualtreatment = $this->jualtreatmentModel->data_pel($id_jutre);
        $data = [
            'title' => 'Edit Data Pelanggan',
            'jualtreatment' => $jualtreatment
        ];
        echo view('penjualantreatment/form_edit', $data);
    }
    public function update()
    {
        $id_jutre = $this->request->getVar('id_penjualantreatment');
        $data = [
            'tanggal'               => $this->request->getVar('tanggal'),
            'nama'      => $this->request->getVar('nama'),
            'qty'      => $this->request->getVar('qty'),
            'harga_satuan'              => $this->request->getVar('harga_satuan'),
            'subtotal'             => $this->request->getVar('subtotal'),
        ];
        $this->jualtreatmentModel->update_data($data, $id_jutre);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('penjualantreatment');
    }

    public function delete($id_jutre)
    {
        $this->jualtreatmentModel->delete_data($id_jutre);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('penjualantreatment');
    }
}
