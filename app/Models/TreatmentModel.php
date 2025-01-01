<?php

namespace App\Models;

use CodeIgniter\Model;

class TreatmentModel extends Model
{
    protected $table = 'treatment';
    protected $primaryKey = 'id_treatment';
    //untuk mengijinkan menambah data
    protected $allowedFields = ['kode_tre', 'nama', 'harga', 'diskon'];

    public function data_treatment($id_treatment)
    {
        return $this->find($id_treatment);
    }
    public function update_data($data, $id_treatment)
    {
        $query = $this->db->table($this->table)->update($data, array('id_treatment' => $id_treatment));
        return $query;
    }
    public function delete_data($id_treatment)
    {
        $query = $this->db->table($this->table)->delete(array('id_treatment' => $id_treatment));
        return $query;
    }
}
