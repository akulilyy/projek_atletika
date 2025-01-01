<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search'); // Ambil input pencarian dari query string
        $supplierModel = new \App\Models\SupplierModel(); // Pastikan Anda menggunakan model yang sesuai

        if ($search) {
            $supplier = $supplierModel->like('nama', $search)
                ->orLike('alamat', $search)
                ->findAll();
        } else {
            $supplier = $supplierModel->findAll();
        }

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data Supplier',
            'supplier' => $supplier,
            'search' => $search, // Kirimkan data pencarian ke view
        ];

        // Memanggil view dan mengirim data
        echo view('supplier/datasupplier', $data);
    }
    public function tambah()
    {
        //menambahkan form tambah pada folder mahasiswa
        $data = [
            'title' => 'Tambah Data Supplier',
        ];
        echo view('supplier/form_tambah', $data);
    }

    public function simpan()
    {
        $this->supplierModel->save([
            'nama'               => $this->request->getVar('nama'),
            'no_hp'              => $this->request->getVar('no_hp'),
            'alamat'             => $this->request->getVar('alamat'),
        ]);
        session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('supplier');
    }

    public function edit($id_sup)
    {
        $supplier = $this->supplierModel->data_sup($id_sup);
        $data = [
            'title' => 'Edit Data Supplier',
            'supplier' => $supplier
        ];
        echo view('supplier/form_edit', $data);
    }

    public function update()
    {
        $id_sup = $this->request->getVar('id_supplier');
        $data = [
            'nama'               => $this->request->getVar('nama'),
            'no_hp'              => $this->request->getVar('no_hp'),
            'alamat'             => $this->request->getVar('alamat'),
        ];
        $this->supplierModel->update_data($data, $id_sup);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('supplier');
    }

    public function delete($id_sup)
    {
        $this->supplierModel->delete_data($id_sup);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('supplier');
    }
}
