<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VotePurpose;
use App\Model\Candidate;
use App\Model\Category;
use Auth;

class PresidentController extends Controller
{
    public function view(){
        $allData['candidates'] = Candidate::where('category_id', '1')->get();
        $allData['vote_purposes'] = VotePurpose::all();
        // dd($allData);
        return view('backend.president.view-president-candid', $allData);
    }

    public function add(){
        // $data['categories'] = Category::all();
        $data['candidates'] = Candidate::all();
        $data['vote_purposes'] = VotePurpose::all();
        // dd($data['vote_purposes']);
        return view('backend.president.add-president-candid', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $candidate = new Candidate();
        $candidate->vote_purpose_id = $request->vote_purpose_id;
        $candidate->category_id = '1';
        $candidate->name = $request->name;
        $candidate->created_by = Auth::user()->id;
        $candidate->save();

        return redirect()->route('candidates.president.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Candidate::find($id);
        $data['vote_purposes'] = VotePurpose::find($id);
        // dd($data['vote_purposes']);
        return view('backend.president.add-president-candid', $data);
    }

    public function update(Request $request, $id){
        $candidate = Candidate::find($id);
        $candidate->vote_purpose_id = $request->vote_purpose_id;
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
