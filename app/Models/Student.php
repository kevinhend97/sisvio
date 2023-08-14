<?php

namespace App\Models;

use CodeIgniter\Model;

class Student extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nis',
        'name',
        'gender',
        'class',
        'address',
        'phone'
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

    public function gets($name, $offset, $limit)
    {
        $getSessionNis = session()->get("nis");

        $data = $this->select("
                students.*,
                sum(student_violations.point) as sum_violation,
                GROUP_CONCAT(penalties.title SEPARATOR ',') as penalties,

                GROUP_CONCAT(violations.title SEPARATOR ',') as violations,
                GROUP_CONCAT(student_violations.point SEPARATOR ',') as violation_points
            ")
            ->join('student_violations', 'student_violations.student_id = students.id', 'left')
            ->join('student_penalties', 'student_penalties.student_id = students.id', 'left')
            ->join('violations', 'violations.id = student_violations.violation_id', 'left')
            ->join('penalties', 'penalties.id = student_penalties.penalty_id', 'left')
            ->when($name, function ($query, $name) {
                return $query->like('name', $name);
            });

        if ($getSessionNis) {
            $data = $data->where("students.id", session()->get("id"));
            $limit = 1;
            $offset = 0;
        }

        return $data->groupBy('students.id')
            ->orderBy('class', 'ASC')
            ->limit($limit, $offset)->find();
    }

    public function getCount($name)
    {
        $getSessionNis = session()->get("nis");

        $data =  $this->select("
            students.*,
            sum(student_violations.point) as sum_violation,
            GROUP_CONCAT(penalties.title SEPARATOR ',') as penalties,

            GROUP_CONCAT(violations.title SEPARATOR ',') as violations,
            GROUP_CONCAT(student_violations.point SEPARATOR ',') as violation_points
        ")
            ->join('student_violations', 'student_violations.student_id = students.id', 'left')
            ->join('student_penalties', 'student_penalties.student_id = students.id', 'left')
            ->join('violations', 'violations.id = student_violations.violation_id', 'left')
            ->join('penalties', 'penalties.id = student_penalties.penalty_id', 'left')
            ->when($name, function ($query, $name) {
                return $query->like('name', $name);
            });

        if ($getSessionNis) {
            $data = $data->where("students.id", session()->get("id"));
        }

        return $data->countAllResults();
    }

    public function getByUsername($username)
    {
        return $this->where('nis', $username)->doFirst();
    }

    public function getCountByCode($nis)
    {
        return $this->where('nis', $nis)->countAllResults();
    }

    public function deleteByCode($code)
    {
        return $this->where('nis', $code)->doDelete();
    }
}
