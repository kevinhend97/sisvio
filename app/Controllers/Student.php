<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Achievement;
use App\Models\Penalty;
use App\Models\Student as ModelsStudent;
use App\Models\StudentAchievement;
use App\Models\StudentPenalties;
use App\Models\StudentViolation;
use App\Models\Violation;
use CodeIgniter\HTTP\Request;

class Student extends BaseController
{
    private ModelsStudent $studentModel;
    private Achievement $achievementModel;
    private Violation $violationModel;
    private Penalty $penaltyModel;
    private StudentAchievement $studentAchievementModel;
    private StudentViolation $studentViolationModel;
    private StudentPenalties $studentPenaltyModel;

    public function __construct()
    {
        $this->studentModel = new ModelsStudent();
        $this->achievementModel = new Achievement();
        $this->studentAchievementModel = new StudentAchievement();
        $this->violationModel = new Violation();
        $this->studentViolationModel = new StudentViolation();
        $this->studentPenaltyModel = new StudentPenalties();
        $this->penaltyModel = new Penalty();
    }

    public function index()
    {
        $search = $this->request->getGet('search') ?? '';
        $limit = $this->request->getGet('limit') ?? 10;
        $page = $this->request->getGet('page') ?? 1;
        $offset = ($page - 1) * $limit;
        $data = $this->studentModel->gets($search, $offset, $limit);

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['achievements'] = $this->studentAchievementModel->getsByUser($data[$i]['id']);
            $data[$i]['sum_achievement'] = sumPoints($data[$i]['achievements']);

            $data[$i]['violations'] = $this->studentViolationModel->getsByUser($data[$i]['id']);
            $data[$i]['sum_violation'] = sumPoints($data[$i]['violations']);

            $data[$i]['penalties'] = $this->studentPenaltyModel->getsByUser($data[$i]['id']);
            $data[$i]['sum_violation'] = sumPoints($data[$i]['violations']);
        }

        $count = $this->studentModel->getCount($search);

        return view(
            "Pages/Student/Student",
            $this->data([
                'limit' => $limit,
                'page' => $page,
                'count_page' => floor($count / $limit),
                'count' => $count,
                'students' => $data
            ])
        );
    }

    public function create()
    {
        return view("Pages/Student/StudentModify", $this->data([
            'action' => '/student/create/action'
        ]));
    }

    public function update($code)
    {
        $data = $this->studentModel->getByUsername($code);
        if (!$data) {
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EMPTY);

            return redirect()->back();
        }

        $this->setBulkFlashData($data);

        return view('Pages/Student/StudentModify', $this->data([
            'action' => '/student/update/action'
        ]));
    }

    public function createAction()
    {
        $ok = $this->validate([
            'nis' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $nis = $this->request->getPost('nis');
        if ($this->studentModel->getCountByCode($nis) > 0) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EXIST);

            return redirect()->back();
        }

        $this->studentModel->insert($this->request->getPost());

        return redirect()->to(base_url('/student'));
    }

    public function updateAction()
    {
        $ok = $this->validate([
            'id' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'address' => 'required',
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $id = $this->request->getPost('id');
        $this->studentModel->update($id, $this->request->getPost());

        $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_EDIT);

        return redirect()->to(base_url('/student'));
    }

    public function deleteAction($code)
    {
        $ok = $this->studentModel->deleteByCode($code);
        if ($ok) {
            $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_DELETE);
        } else {
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_DELETE);
        }

        return redirect()->to(base_url('/student'));
    }

    // Achievement
    public function achievement($code)
    {
        return view("Pages/Student/StudentAchievement", $this->data([
            'achievements' => $this->achievementModel->gets(),
            'code' => $code,
            'user' => $this->studentModel->getByUsername($code),
        ]));
    }

    public function achievementAction($code)
    {
        $ok = $this->validate([
            'point' => 'required',
            'achievement_id' => 'required',
        ]);
        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $user = $this->studentModel->getByUsername($code);
        $ok = $this->studentAchievementModel->insert(
            array_merge(
                [
                    'student_id' => $user['id'],
                ],
                $this->request->getPost()
            )
        );

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_INSERT);

            return redirect()->back();
        }

        return redirect()->to(base_url('/student'));
    }

    // Violations
    public function violation($code)
    {
        return view("Pages/Student/StudentViolation", $this->data([
            'violations' => $this->violationModel->gets(),
            'code' => $code,
            'user' => $this->studentModel->getByUsername($code),
        ]));
    }

    public function violationAction($code)
    {
        $ok = $this->validate([
            'point' => 'required',
            'violation_id' => 'required',
        ]);
        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $user = $this->studentModel->getByUsername($code);
        if (!$user) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_USER_NOT_FOUND);

            return redirect()->back();
        }

        $ok = $this->studentViolationModel->insert(
            array_merge(
                [
                    'student_id' => $user['id'],
                ],
                $this->request->getPost()
            )
        );

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_INSERT);

            return redirect()->back();
        }

        return redirect()->to(base_url('/student'));
    }

    // Penalty
    public function penalty($code)
    {
        return view("Pages/Student/StudentPenalty", $this->data([
            'penalties' => $this->penaltyModel->gets(),
            'code' => $code,
            'user' => $this->studentModel->getByUsername($code),
        ]));
    }

    public function penaltyAction($code)
    {
        $ok = $this->validate([
            'penalty_id' => 'required',
        ]);
        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $user = $this->studentModel->getByUsername($code);
        if (!$user) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_USER_NOT_FOUND);

            return redirect()->back();
        }

        $ok = $this->studentPenaltyModel->insert(
            array_merge(
                [
                    'student_id' => $user['id'],
                ],
                $this->request->getPost()
            )
        );
        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_INSERT);

            return redirect()->back();
        }

        return redirect()->to(base_url('/student'));
    }
}
