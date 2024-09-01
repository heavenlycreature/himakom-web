<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;


class JournalController extends Controller
{
    public function index(){
        $journals = Journal::latest()->get()->map(function ($journal){
            return [
                'judul' => $journal->judul,
                'penerbit' => $journal->penerbit,
                'sumber' => $journal->sumber,
                'tahun' => $journal->tahun,
                'pdf' => $journal->pdf,
                'slug' => $journal->slug,
            ];
        });
        return view('admin.journal.index', [
            'title' => 'List Jurnal',
            'journals' => $journals,
        ]);
    }

    public function create(){
        return view('admin.journal.form.create', ['title' => 'Tambah Jurnal']);
    }

    public function store(Request $request){
        $rules = [
           'judul' => 'required',
            'penerbit' => 'required|max:255',
            'sumber' => 'required',
            'tujuan' => 'required',
            'tahun' => 'required',
            'volume' => 'required',
            'slug' => 'required',
            'rujuk' => 'required',
            'pdf' => 'required|url',
        ];
    
        $validatedData = $request->validate($rules);

        try {
            DB::beginTransaction();
    
    
            Journal::create($validatedData);
    
            DB::commit();
    
            return redirect(route('journal.index'))->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
 
    
            // Log the error
            Log::error('Blog creation failed: ' . $e->getMessage());
    
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function show($slug){

        try {
            $journal = Journal::where('slug', $slug)->firstOrFail();
            $pdfPath = storage_path('app/public/' . $journal->pdf);
    
            if (!file_exists($pdfPath)) {
                Log::error('PDF file not found: ' . $pdfPath);
                return response()->view('pages.404', [], 404);
            }
    
            return response()->file($pdfPath);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->view('pages.404', [], 404);
        } catch (\Exception $e) {
            Log::error('Error in JournalController@show: ' . $e->getMessage());
            return response()->view('pages.404', [], 500);
        }
      
    }
    public function edit($slug){
        $journal = Journal::where('slug', $slug)->firstOrFail();
        $pdfFileName = $journal->pdf ? basename($journal->pdf) : null;
        return view('admin.journal.form.edit', [
            'title' => 'Edit Jurnal',
            'journal' => $journal,
            'pdf' => $pdfFileName,
        ]);
    }

    public function update(Request $request, $slug){
        $journal = Journal::where('slug', $slug)->firstOrFail();
        $rules = [
            'judul' => 'required',
             'penerbit' => 'required|max:255',
             'sumber' => 'required',
             'tujuan' => 'required',
             'tahun' => 'required',
             'volume' => 'required',
             'slug' => 'required',
             'rujuk' => 'required',
             'pdf' => 'required|url',
         ];
     
         $validatedData = $request->validate($rules);
 
         try {
             DB::beginTransaction();
         
             if ($request->hasFile('pdf')) {
         
                $pdfPath = $request->file('pdf')->store('journals-pdf', 'public');
                $validatedData['pdf'] = $pdfPath;
            }
            $journal->update($validatedData);
            DB::commit();
            return redirect(route('journal.index'))->with('success', 'Data berhasil ditambahkan!');
         } catch (\Exception $e) {
             DB::rollBack();
     
             // If an journal was uploaded, delete it
             if (isset($pdfPath)) {
                Storage::disk('public')->delete($pdfPath);
             }
     
             // Log the error
             Log::error('Blog creation failed: ' . $e->getMessage());
     
             return redirect()->back()
                 ->withInput()
                 ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
         }

    }

    public function destroy($slug){
        $journal = Journal::where('slug', $slug)->firstOrFail();

        if($journal->pdf){
            Storage::delete($journal->pdf);
        }
    
        $journal->delete();
    
        return redirect(route('journal.index'))->with('success', 'Post deleted!!!');
    }
}
