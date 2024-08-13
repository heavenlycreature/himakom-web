<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Journal;
use App\Models\Kahim;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function main(Blogs $blogs, Kahim $kahim){
        $blogs = $blogs->latest()->get();
        $kahim = $kahim->firstOrFail();
        return view('pages.main', [
            'title' => 'Home',
            'blogs' => $blogs,
            'kahim' => $kahim
        ]);
    }

    public function artikel(){
        $blogs = Blogs::latest()->paginate(6);
        return view('pages.blog.homepage', [
            'title' => 'Artikel',
            'blogs' => $blogs
        ]);
    }

    public function journal(){
        $journals = Journal::all()->map(function ($journal){
            return [
                'title' => $journal->judul,
                'author' => $journal->penerbit,
                'source' => $journal->sumber,
                'year' => $journal->tahun,
                'citations' => $journal->rujuk,
                'pdf' => $journal->id,
            ];
        });
        return view('pages.jurnal.journal', [
            'title' => 'Jurnal',
            'journals' => $journals,
        ]);
    }

    public function about(Kahim $kahim){
        $kahim = $kahim->firstOrFail();
        return view('pages.about', [
            'title' => 'Tentang Kami',
            'kahim' => $kahim,
        ]);
    }

}
