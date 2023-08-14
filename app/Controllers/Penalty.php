<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Penalty as ModelsPenalty;

class Penalty extends BaseController
{
    private ModelsPenalty $penaltyModel;

    public function __construct()
    {
        $this->penaltyModel = new ModelsPenalty();
    }

    public function index()
    {
        $data = $this->penaltyModel->gets();
        return view("Pages/Penalty/Penalty", $this->data($data));
    }

    public function create()
    {
        return view('Pages/Penalty/PenaltyModify', $this->data([
            'action' => '/penalty/create/action'
        ]));
    }

    public function update($code)
    {
        $data = $this->penaltyModel->getByCode($code);
        if (!$data) {
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EMPTY);

            return redirect()->back();
        }

        $this->setBulkFlashData($data);

        return view('Pages/Penalty/PenaltyModify', $this->data([
            'action' => '/penalty/update/action'
        ]));
    }

    public function createAction()
    {
        $ok = $this->validate([
            'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'min_point' => 'required'
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $code = $this->request->getPost('code');
        if ($this->penaltyModel->getCountByCode($code) > 0) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, DATA_EXIST);

            return redirect()->back();
        }

        $this->penaltyModel->insert($this->request->getPost());

        return redirect()->to(base_url('/penalty'));
    }

    public function updateAction()
    {
        $ok = $this->validate([
            'id' => 'required',
            'code' => 'required',
            'title' => 'required',
            'description' => 'required',
            'min_point' => 'required'
        ]);

        if (!$ok) {
            $this->setBulkFlashData($this->request->getPost());
            $this->session->setFlashdata(MESSAGE_ERROR, INPUT_INVALID);

            return redirect()->back();
        }

        $id = $this->request->getPost('id');
        $this->penaltyModel->update($id, $this->request->getPost());

        $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_EDIT);

        return redirect()->to(base_url('/penalty'));
    }

    public function deleteAction($code)
    {
        $ok = $this->penaltyModel->deleteByCode($code);
        if ($ok) {
            $this->session->setFlashdata(MESSAGE_SUCCESS, SUCCESS_DELETE);
        } else {
            $this->session->setFlashdata(MESSAGE_ERROR, ERROR_DELETE);
        }

        return redirect()->to(base_url('/penalty'));
    }
}
