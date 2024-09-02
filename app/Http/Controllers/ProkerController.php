<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProkerController extends Controller
{
    public function create(){
        return view('admin.proker.create');
    }
    public function store(Request $request){
        try {
            $validatedData = $this->validateRequest($request);
            Proker::create($validatedData);
            return redirect(route('dashboard'))->with('success', 'Program kerja berhasil ditambahkan!');
        } catch (ValidationException $exception) {
            throw new ValidationException($exception->validator, $this->formatValidationErrors($exception->errors()));
        }
     
    }
    private function validateRequest(Request $request){
    $rules = [
        'judul' => 'required|max:255',
        'deskripsi' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        throw new ValidationException($validator);
    }

    return $validator->validated();
}
private function formatValidationErrors($errors){
    $formattedErrors = [];

    foreach ($errors->all() as $error) {
        $formattedErrors[] = [
            'message' => $error,
        ];
    }

    return $formattedErrors;
}

public function edit($id){
    $proker = Proker::findOrFail($id);
    return view('admin.proker.edit', [
        'title' => 'Edit Proker',
        'proker' => $proker,
    ]);
}

public function update(Request $request, $id){
    $proker = Proker::findOrFail($id);
    try {
        $rules = [
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
        ];
    
        $validatedData = $request->validate($rules); 
      
        // Update other fields
        $proker->update($validatedData);
        $proker->save();
    
        return redirect('/dashboard')->with('success', 'Program kerja berhasil Di update!!');
        } 
        catch (ValidationException $exception) {
        return redirect()->back()->withErrors($exception->errors())->withInput();
    }


}

public function destroy($id){
    $proker = Proker::findOrFail($id);
    $proker->delete();  
    return redirect(route('dashboard'))->with('success', 'Program kerja berhasil dihapus!');
}

}
