<?php

namespace App\Controllers;

use App\Models\SupplierModel;
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

        $search = $this->request->getGet('search'); // Ambil input pencarian dari query string
        $produkModel = new \App\Models\ProdukModel();

        if ($search) {
            $produk = $produkModel->like('kode_produk', $search)
                ->orLike('nama', $search)
                ->findAll();
        } else {
            $produk = $produkModel->getProdukWithSupplier(); // Mengambil produk dengan nama supplier
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Produk',
            'produk' => $produk,
            'search' => $search, // Kirimkan data pencarian ke view
        ];
        // Memanggil view dan mengirim data
        echo view('produk/dataproduk', $data);
    }
    public function tambah()
    {
        $supplierModel = new \App\Models\SupplierModel(); // Pastikan model SupplierModel sudah ada
        $supplier = $supplierModel->findAll();  // Ambil semua data supplier
        //menambhakan form tambah pada folder
        $data = [
            'title' => 'Tambah Data Produk',
            'supplier' => $supplier
        ];
        echo view('produk/form_tambah', $data);
    }


    public function simpan()
    {
        $kode_pro = $this->request->getVar('kode_produk');
        $id_supplier = $this->request->getVar('id_supplier'); // Ambil id_supplier dari form

        // Cek apakah id_supplier valid
        $supplierModel = new \App\Models\SupplierModel();
        $supplier = $supplierModel->find($id_supplier);

        if (!$supplier) {
            session()->setFlashdata('error', 'Supplier tidak ditemukan.');
            return redirect()->back()->withInput();
        }

        // Cek apakah kode produk sudah ada
        $existingData = $this->produkModel->where('kode_produk', $kode_pro)->first();

        if ($existingData) {
            session()->setFlashdata('error', 'Data sudah ada. Gunakan kode yang berbeda.');
            return redirect()->back()->withInput();
        }

        // Cek apakah ada field yang kosong
        if (empty($kode_pro) || empty($id_supplier) || empty($this->request->getVar('nama')) || empty($this->request->getVar('harga_produk')) || empty($this->request->getVar('stok')) || empty($this->request->getVar('diskon'))) {
            session()->setFlashdata('error', 'Semua field wajib diisi.');
            return redirect()->back()->withInput();
        }

        // Simpan data produk
        $this->produkModel->save([
            'kode_produk'  => $kode_pro,
            'nama'         => $this->request->getVar('nama'),
            'id_supplier'  => $id_supplier,
            'stok'         => $this->request->getVar('stok'),
            'harga_produk' => $this->request->getVar('harga_produk'),
            'diskon'       => $this->request->getVar('diskon'),
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('produk');
    }

    public function edit($id_produk)
    {
        $produk = $this->produkModel->find($id_produk);
        $supplierModel = new \App\Models\SupplierModel();
        $supplier = $supplierModel->findAll(); // Ambil semua supplier

        $data = [
            'title'   => 'Edit Produk',
            'produk'  => $produk,
            'supplier' => $supplier // Kirim data supplier ke view
        ];
        echo view('produk/form_edit', $data);
    }

    public function update()
    {
        $id_produk = $this->request->getVar('id'); // Pastikan menggunakan 'id' yang benar dari input hidden
        $data = [
            'kode_produk'   => $this->request->getVar('kode'),
            'nama'          => $this->request->getVar('nama'),
            'id_supplier'   => $this->request->getVar('id_supplier'), // Perbaiki dengan 'id_supplier'
            'harga_produk'  => $this->request->getVar('harga_produk'),
            'stok'          => $this->request->getVar('stok'),
            'diskon'        => $this->request->getVar('diskon'),
        ];

        // Pastikan data produk dengan id_produk tersebut ada
        if ($this->produkModel->find($id_produk)) {
            // Update data produk
            $this->produkModel->update($id_produk, $data);
            session()->setFlashdata('success', 'Data berhasil diedit!');
        } else {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
        }

        return redirect()->to('produk');
    }


    public function delete($id_produk)
    {
        $this->produkModel->delete_data($id_produk);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('produk');
    }
}
