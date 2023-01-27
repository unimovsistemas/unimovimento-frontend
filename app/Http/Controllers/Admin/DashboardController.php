<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Analytics\Analytics;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->view = 'admin.';
    }


    public function index()
    {
        return view($this->view . 'dashboard');
    }

    public function logout()
    {

    }
}
