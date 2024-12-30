<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['nama', 'no_hp', 'alamat'];

    public function data_sup($id_sup)
    {
        return $this->find($id_sup);
    }
    public function update_data($data, $id_sup)
    {
        $query = $this->db->table($this->table)->update($data, array('id_supplier' => $id_sup));
        return $query;
    }
    public function delete_data($id_sup)
    {
        $query = $this->db->table($this->table)->delete(array('id_supplier' => $id_sup));
        return $query;
    }
}
