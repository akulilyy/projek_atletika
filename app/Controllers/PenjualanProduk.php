<?php

namespace App\Controllers;

use App\Models\DetailProdukModel;
use App\Models\jualProdukModel;
use App\Models\ProdukModel;
use App\Models\PenjualanModel;

class PenjualanProduk extends BaseController
{
    protected $DetailProdukModel;

    public function __construct()
    {
        $this->DetailProdukModel = new DetailProdukModel();
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

        $model = new DetailProdukModel();

        // Mengambil data detail produk dengan nama produk
        $data['detail_produk'] = $model->getDetailProduk();


        // Memanggil view dan mengirim data
        echo view('penjualanproduk/jualproduk', $data);
    }
    // Fungsi untuk menampilkan form tambah data detail produk
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Penjualan Produk',
            'produk' => $this->DetailProdukModel->getProduk() // Ambil data produk untuk dropdown
        ];
        return view('penjualanproduk/form_tambah', $data);
    }

    // Fungsi untuk menyimpan data detail produk
    public function simpan()
    {
        $data = [
            'tanggal'       => $this->request->getPost('tanggal'),
            'id_produk'     => $this->request->getPost('id_produk'),
            'jumlah'        => $this->request->getPost('jumlah'),
            'harga_satuan'  => $this->request->getPost('harga_satuan'),
            'subtotal'      => $this->request->getPost('subtotal'),
        ];

        // Menyimpan data ke tabel detail_produk
        $this->DetailProdukModel->save($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('/penjualanproduk');
    }

    // Fungsi untuk menampilkan halaman edit
    public function edit($id_detail_produk)
    {
        $detailProduk = $this->DetailProdukModel->find($id_detail_produk);

        // Pastikan data ditemukan
        if (!$detailProduk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Detail produk dengan ID $id_detail_produk tidak ditemukan.");
        }

        $data = [
            'title'        => 'Edit Data Penjualan Produk',
            'detail_produk' => $detailProduk,
            'produk'       => $this->DetailProdukModel->getProduk() // Ambil data produk untuk dropdown
        ];

        return view('penjualanproduk/form_edit', $data);
    }

    // Fungsi untuk memperbarui data detail produk
    public function update()
    {
        $id_detail_produk = $this->request->getPost('id_detail_produk');
        $data = [
            'tanggal'       => $this->request->getPost('tanggal'),
            'id_produk'     => $this->request->getPost('id_produk'),
            'jumlah'        => $this->request->getPost('jumlah'),
            'harga_satuan'  => $this->request->getPost('harga_satuan'),
            'subtotal'      => $this->request->getPost('subtotal'),
        ];

        // Update data berdasarkan ID
        $this->DetailProdukModel->update($id_detail_produk, $data);
        session()->setFlashdata('success', 'Data berhasil diperbarui!');
        return redirect()->to('/penjualanproduk');
    }

    // Fungsi untuk menghapus data detail produk
    public function delete($id_detail_produk)
    {
        $this->DetailProdukModel->delete($id_detail_produk);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('/penjualanproduk');
    }
}
