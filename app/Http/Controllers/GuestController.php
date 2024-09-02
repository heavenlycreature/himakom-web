<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Journal;
use App\Models\Kahim;
use App\Models\Proker;
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
                'pdf' => $journal->slug,
            ];
        });
        return view('pages.jurnal.journal', [
            'title' => 'Jurnal',
            'journals' => $journals,
        ]);
    }

    public function about(Kahim $kahim, Proker $proker){
        $kahim = $kahim->firstOrFail();
        $proker = $proker->all();
        return view('pages.about', [
            'title' => 'Tentang Kami',
            'kahim' => $kahim,
            'proker' => $proker
        ]);
    }

    public function showArtikel($slug){
        $blog = Blogs::where('slug' , $slug)->firstOrFail();

        return view('pages.blog.detail', [
            'title' => $blog->excerpt,
            'blog' => $blog
        ]);
    }

    public function showJurnal($slug){
        $journal = Journal::where('slug' , $slug)->firstOrFail();

        return view('pages.jurnal.detail', [
            'title' => $journal->judul,
            'journal' => $journal
        ]);
    }

}
