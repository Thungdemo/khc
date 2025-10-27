<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Filetype;
use Illuminate\Http\Request;
use App\Models\RegistryOfficial;
use App\Http\Controllers\Controller;

class RegistryOfficialController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.registry-official.index',[
            'registryOfficials' => RegistryOfficial::paginate(config('khc.pagination'))
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.registry-official.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required',new Xss],
            'designation' => ['required',new Xss],
            'dob' => ['nullable','date','before:today'],
            'qualification' => ['nullable',new Xss],
            'email' => ['nullable','email',new Xss],
            'phone_no' => ['nullable','digits:10'],
            'photo' => ['required','file','max:1000',new Filetype(['jpg','png'])]
        ]);
        RegistryOfficial::create([
            'full_name' => $request->full_name,
            'designation' => $request->designation,
            'dob' => $request->dob,
            'qualification' => $request->qualification,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
        ]);
        return redirect()->route('admin.registry-official.create')->with('success', 'Record created successfully.');
    }

    public function edit(RegistryOfficial $registryOfficial)
    {
        return view('admin.registry-official.edit',[
            'registryOfficial' => $registryOfficial
        ]);
    }

    public function update(Request $request, RegistryOfficial $registryOfficial)
    {
        $request->validate([
            'full_name' => ['required',new Xss],
            'designation' => ['required',new Xss],
            'dob' => ['nullable','date','before:today'],
            'qualification' => ['nullable',new Xss],
            'email' => ['nullable','email',new Xss],
            'phone_no' => ['nullable','digits:10'],
            'photo' => ['nullable','file','max:1000',new Filetype(['jpg','png'])]
        ]);
        $registryOfficial->update([
            'full_name' => $request->full_name,
            'designation' => $request->designation,
            'dob' => $request->dob,
            'qualification' => $request->qualification,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
        ]);
        return redirect()->route('admin.registry-official.edit',$registryOfficial)->with('success', 'Record updated successfully.');
    }

    public function destroy(RegistryOfficial $registryOfficial)
    {
        $registryOfficial->delete();
        return redirect()->route('admin.registry-official.index')->with('success', 'Record deleted successfully.');
    }
}
