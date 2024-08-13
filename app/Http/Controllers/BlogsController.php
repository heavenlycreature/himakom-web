<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogs::all()->map(function ($blog){
            return [
                'title' => $blog->title,
                'excerpt' => $blog->excerpt,
                'slug' => $blog->slug,
                'tanggal' => $blog->formatted_publish,
            ];
        });
        return view('admin.blogs.index', [
            'title' => 'List artikel',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:blogs',
            'img' => 'nullable|image|max:2048',
        ];
    
        $validatedData = $request->validate($rules);

        try {
            DB::beginTransaction();
    
            $validatedData['user_id'] = auth()->id();
    
            if ($request->hasFile('img')) {
                $imagePath = $request->file('img')->store('blogs-images');
                $validatedData['img'] = $imagePath;
            }
    
            Blogs::create($validatedData);
    
            DB::commit();
    
            return redirect(route('blogs.index'))->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
    
            // If an image was uploaded, delete it
            if (isset($imagePath)) {
                Storage::delete($imagePath);
            }
    
            // Log the error
            Log::error('Blog creation failed: ' . $e->getMessage());
    
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs, $slug)
    {
        $blogs = Blogs::where('slug', $slug)->firstOrFail();
        return view('admin.blogs.detail', [
            'title' => $blogs->excerpt,
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $blogs = Blogs::Where('slug', $slug)->firstOrFail();
        return view('admin.blogs.form.edit', [
            'title' => 'Edit Artikel',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $blogs = Blogs::Where('slug', $slug)->firstOrFail();
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $blogs->id,
            'img' => 'nullable|image|max:2048',
        ];
    
        $validatedData = $request->validate($rules);

        try {
            DB::beginTransaction();
    
            $validatedData['user_id'] = auth()->id();
    
            if($request->hasFile('img')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                $validatedData['img'] = $request->file('img')->store('blogs-images');
            }
    
            $blogs->update($validatedData);
    
            DB::commit();
    
            return redirect(route('blogs.index'))->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
    
            // If an image was uploaded, delete it
            if (isset($validatedData['img'])) {
                Storage::delete($validatedData['img']);
            }
    
            // Log the error
            Log::error('Blog update failed: ' . $e->getMessage());
    
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstOrFail();

        if($blog->img){
            Storage::delete($blog->img);
        }
    
        $blog->delete();
    
        return redirect(route('blogs.index'))->with('success', 'Post deleted!!!');
    }
}

