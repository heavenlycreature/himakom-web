<?php

namespace App\Http\Controllers;

use App\Models\Kahim;
use App\Models\Proker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $kahim = Kahim::first();
        $proker = Proker::all();
      return view('admin.dashboard', [
        'title' => 'Dashboard',
        'name' => auth()->user()->name,
        'kahim' => $kahim,
        'proker' => $proker,
      ]);
    }
}
