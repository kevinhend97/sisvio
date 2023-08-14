<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Analytic extends BaseController
{
    public function index()
    {
        return view("Pages/Analytic/Analytic", $this->data());
    }
}
