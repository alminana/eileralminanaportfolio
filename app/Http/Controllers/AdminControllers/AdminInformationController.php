<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Information;

class AdminInformationController extends Controller
{

    private $rules = [
        'slogan' => 'required|max:200',
        'position' => 'required|max:200',
        'address' => 'required|max:1000',
        'mobile' => 'required|numeric',
        'email' => 'required',
        'website' => 'required',
    ];

    public function index(Information $information){
        $information = Information::latest()->take(10)->get();
        return view('admin_dashboard.information.index',compact('information'));
    } 

    public function create(){
        return view('admin_dashboard.information.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $information = Information::create($validated);
      
        return redirect()->route('admin.information.index')->with('success', 'Post has been created.');
    }

    public function edit(Information $information)
    {
        return view('admin_dashboard.information.edit', [
            'information' => $information,
        ]);
    }

    public function update(Request $request, Information $information)
    {
        $validated = $request->validate($this->rules);
        $information->update($validated);

        return redirect()->route('admin.information.index', $information)->with('success', 'Information has been Updated.');
    }

    public function destroy(Information $information)
    {
        $information->delete();
        return redirect()->route('admin.information.index')->with('success', 'information has been deleted');
    }
}
