<?php

namespace App\Models;

use CodeIgniter\Model;

class Penalty extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penalties';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'code',
        'title',
        'description',
        'min_point'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function gets()
    {
        return $this->select('penalties.*, count(student_penalties.id) as count')
            ->join('student_penalties', 'student_penalties.penalty_id = penalties.id', 'left')
            ->groupBy('penalties.id')
            ->orderBy('id', 'DESC')->doFindAll();
    }

    public function getCountByCode($code)
    {
        return $this->where('code', $code)->countAllResults();
    }

    public function getByCode($code)
    {
        return $this->where('code', $code)->doFirst();
    }

    public function deleteByCode($code)
    {
        return $this->where('code', $code)->doDelete();
    }
}
