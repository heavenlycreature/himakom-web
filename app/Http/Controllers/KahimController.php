<?php

namespace App\Http\Controllers;

use App\Models\Kahim;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KahimController extends Controller
{
    public function edit(Kahim $kahim){
        return view('admin.kahim.edit', [
            'title' => 'Edit Profile',
            'kahim' => $kahim,
        ]);
    }
    public function update(Request $request, $id){
        $kahim = Kahim::findOrFail($id);

        $rules = [
            'nama' => 'required|max:255',
            'bio' => 'required',
            'img' => 'nullable|image|max:2048',
            'visi-misi' => 'required',
        ];
    
        $validatedData = $request->validate($rules);
        
        // validate new image file and store to new database
        if($request->hasFile('img')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['img'] = $request->file('img')->store('kahim-picture');
        }
        
        // Handle the 'visi-misi' field separately
        $visiMisi = $request->input('visi-misi');

        // Remove 'visi-misi' from $validatedData if it exists
        unset($validatedData['visi-misi']);

        // Update other fields
        $kahim->update($validatedData);

        // Update 'visi-misi' separately
        $kahim->{'visi-misi'} = $visiMisi;
        $kahim->save();

        return redirect('/dashboard')->with('success', 'Data berhasil Di update!!');
    }
}
