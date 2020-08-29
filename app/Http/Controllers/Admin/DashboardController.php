<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		$data['breadcrumb'] = 'Dashboard';
		$data['breadcrumb_icon'] = 'icofont-dashboard-web';
        $data['breadcrumb_brief'] = 'This is the overview page of the whole application';
		return view('backend.dashboard',$data);
	}
}
