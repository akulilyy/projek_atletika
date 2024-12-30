<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'nama', 'role'];

    public function data_us($id_us)
    {
        return $this->find($id_us);
    }
    public function update_data($data, $id_us)
    {
        $query = $this->db->table($this->table)->update($data, array('id_user' => $id_us));
        return $query;
    }
    public function delete_data($id_us)
    {
        $query = $this->db->table($this->table)->delete(array('id_user' => $id_us));
        return $query;
    }
}
