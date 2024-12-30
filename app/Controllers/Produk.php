<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        // Mengambil semua data 
        $produk = $this->produkModel->findAll();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Produk',
            'produk' => $produk
        ];

        // Memanggil view dan mengirim data
        echo view('produk/dataproduk', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data Produk',
        ];
        echo view('produk/form_tambah', $data);
    }

    public function simpan()
    {
        $kode_pro = $this->request->getVar('kode_produk');

        $existingData = $this->produkModel->where('kode_produk', $kode_pro)->first();

        if ($existingData) {
            session()->setFlashdata('error', 'Data sudah ada. Gunakan kode yang berbeda.');
            return redirect()->back()->withInput();
        }
        if (empty($kode_pro) || empty('nama') || empty('supplier') || empty('harga_produk') || empty('stok') || empty('diskon')) {
            session()->setFlashdata('error', 'Semua field wajib diisi.');
            return redirect()->back()->withInput();
        }
        $this->produkModel->save([
            'kode_produk'           => $kode_pro,
            'nama'               => $this->request->getVar('nama'),
            'supplier'           => $this->request->getVar('supplier'),
            'harga_produk'       => $this->request->getVar('harga_produk'),
            'stok'               => $this->request->getVar('stok'),
            'diskon'             => $this->request->getVar('diskon'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('produk');
    }

    public function edit($id_produk)
    {
        $produk = $this->produkModel->data_pro($id_produk);
        $data = [
            'title' => 'Edit Data Produk',
            'produk' => $produk
        ];
        echo view('produk/form_edit', $data);
    }

    public function update()
    {
        $id_produk = $this->request->getVar('id_produk');
        $data = [
            'kode_produk'           => $this->request->getVar('kode_produk'),
            'nama'               => $this->request->getVar('nama'),
            'supplier'           => $this->request->getVar('supplier'),
            'harga_produk'       => $this->request->getVar('harga_produk'),
            'stok'               => $this->request->getVar('stok'),
            'diskon'             => $this->request->getVar('diskon'),
        ];
        $this->produkModel->update_data($data, $id_produk);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('produk');
    }

    public function delete($id_produk)
    {
        $this->produkModel->delete_data($id_produk);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('produk');
    }
}
