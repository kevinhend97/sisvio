<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Violation as ModelsViolation;

class Violation extends BaseController
{
    private ModelsViolation $violationModel;

    public function __construct()
    {
        $this->violationModel = new ModelsViolation();
    }

    public function index()
    {
        $data = $this->violationModel->gets();
        return view("Pages/Violation/Violation", $this->data($data));
    }

    public function create()
    {
        return view('Pages/Violation/ViolationModify', $this->data([
            'action' => '/violation/create/action'
        ]));
    }

    public function update($code)
    {
        $data = $this->violationModel->getByCode($code);
        if (!$data) {
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EMPTY);

            return redirect()->back();
        }

        $this->setBulkFlashData($data);

        return view('Pages/Violation/ViolationModify', $this->data([
            'action' => '/violation/update/action'
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
        if ($this->violationModel->getCountByCode($code) > 0) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EXIST);

            return redirect()->back();
        }

        $this->violationModel->insert($this->request->getPost());

        return redirect()->to(base_url('/violation'));
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
        $this->violationModel->update($id, $this->request->getPost());

        $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_EDIT);

        return redirect()->to(base_url('/violation'));
    }

    public function deleteAction($code)
    {
        $ok = $this->violationModel->deleteByCode($code);
        if ($ok) {
            $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_DELETE);
        } else {
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_DELETE);
        }

        return redirect()->to(base_url('/violation'));
    }
}
