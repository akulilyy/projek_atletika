<?php

namespace App\Controllers;

use App\Models\jualProdukModel;
use App\Models\ProdukModel;
use App\Models\PenjualanModel;

class PenjualanProduk extends BaseController
{
    protected $jualprodukModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->jualprodukModel = new jualProdukModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search'); // Ambil input pencarian dari query string
        $jualprodukModel = new \App\Models\jualProdukModel(); // Pastikan Anda menggunakan model yang sesuai

        if ($search) {
            $jualproduk = $jualprodukModel->like('nama', $search)
                ->orLike('', $search)
                ->findAll();
        } else {
            $jualproduk = $jualprodukModel->findAll();
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Penjualan Produk',
            'jualproduk' => $jualproduk,
            'search' => $search, // Kirimkan data pencarian ke view
        ];

        // Memanggil view dan mengirim data
        echo view('penjualanproduk/jualproduk', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data Penjualan',
        ];
        echo view('penjualanproduk/form_tambah', $data);
    }

    public function simpan()
    {
        $this->jualprodukModel->save([
            'tanggal'          => $this->request->getPost('tanggal'),
            'nama'          => $this->request->getPost('nama'),
            'qty'          => $this->request->getPost('qty'),
            'harga_satuan'         => $this->request->getPost('harga_satuan'),
            'subtotal'        => $this->request->getPost('subtotal'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('penjualanproduk');
    }

    public function edit($id_jupro)
    {
        $jualproduk = $this->jualprodukModel->data_pel($id_jupro);
        $data = [
            'title' => 'Edit Data Pelanggan',
            'jualproduk' => $jualproduk
        ];
        echo view('penjualanproduk/form_edit', $data);
    }
    public function update()
    {
        $id_jupro = $this->request->getVar('id_penjualanproduk');
        $data = [
            'tanggal'               => $this->request->getVar('tanggal'),
            'nama'      => $this->request->getVar('nama'),
            'qty'      => $this->request->getVar('qty'),
            'harga_satuan'              => $this->request->getVar('harga_satuan'),
            'subtotal'             => $this->request->getVar('subtotal'),
        ];
        $this->jualprodukModel->update_data($data, $id_jupro);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('penjualanproduk');
    }

    public function delete($id_jupro)
    {
        $this->jualprodukModel->delete_data($id_jupro);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('penjualanproduk');
    }
}
