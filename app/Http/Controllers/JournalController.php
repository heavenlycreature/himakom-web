<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(){
        return view('admin.journal.index', [
            'title' => 'List Jurnal',
        ]);
    }
}
