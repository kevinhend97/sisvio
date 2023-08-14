<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Achievement as ModelsAchievement;

class Achievement extends BaseController
{
    private ModelsAchievement $achievementModel;

    public function __construct()
    {
        $this->achievementModel = new ModelsAchievement();
    }

    public function index()
    {
        $data = $this->achievementModel->gets();

        return view('Pages/Achievement/Achievement', $this->data($data));
    }

    public function create()
    {
        return view('Pages/Achievement/AchievementModify', $this->data([
            'action' => '/achievement/create/action'
        ]));
    }

    public function update($code)
    {
        $data = $this->achievementModel->getByCode($code);
        if (!$data) {
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EMPTY);

            return redirect()->back();
        }

        $this->setBulkFlashData($data);

        return view('Pages/Achievement/AchievementModify', $this->data([
            'action' => '/achievement/update/action'
        ]));
    }

    public function createAction()
    {
        $ok = $this->validate([
            'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'min_point' => 'required',
            'max_point' => 'required',
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $code = $this->request->getPost('code');
        if ($this->achievementModel->getCountByCode($code) > 0) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EXIST);

            return redirect()->back();
        }

        $this->achievementModel->insert($this->request->getPost());

        return redirect()->to(base_url('/achievement'));
    }

    public function updateAction()
    {
        $ok = $this->validate([
            'id' => 'required',
            'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'min_point' => 'required',
            'max_point' => 'required',
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $id = $this->request->getPost('id');
        $this->achievementModel->update($id, $this->request->getPost());

        $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_EDIT);

        return redirect()->to(base_url('/achievement'));
    }

    public function deleteAction($code)
    {
        $ok = $this->achievementModel->deleteByCode($code);
        if ($ok) {
            $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_DELETE);
        } else {
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_DELETE);
        }

        return redirect()->to(base_url('/achievement'));
    }
}
