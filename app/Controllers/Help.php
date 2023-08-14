<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Help extends BaseController
{
    public function index()
    {
        return view('Pages/Help/Help', $this->data());
    }
}
