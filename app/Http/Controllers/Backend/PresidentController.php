<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Candidate;
use App\Model\Category;
use Auth;

class PresidentController extends Controller
{
    public function view(){
        $allData = Candidate::where('category_id', '1')->get();
        return view('backend.president.view-president-candid', compact('allData'));
    }

    public function add(){
        // $data['categories'] = Category::all();
        return view('backend.president.add-president-candid');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $candidate = new Candidate();
        $candidate->category_id = '1';
        $candidate->name = $request->name;
        $candidate->created_by = Auth::user()->id;
        $candidate->save();

        return redirect()->route('candidates.president.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData = Candidate::find($id);
        return view('backend.president.add-president-candid', compact('editData'));
    }

    public function update(Request $request, $id){
        $candidate = Candidate::find($id);
        $candidate->name = $request->name;
        $candidate->updated_by = Auth::user()->id;
        $candidate->save();

        return redirect()->route('candidates.president.view')->with('success', 'Data updated successfully');

    }

    public function delete($id){
        $candidate = Candidate::find($id);
        $candidate->delete();

        return redirect()->route('candidates.president.view')->with('success', 'Data deleted successfully');
    }
}
