<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        if ($this->isLogin()) {
            return redirect()->to(base_url('/student'));
        }

        return redirect()->to(base_url('/auth/login?type=admin'));
    }
}
