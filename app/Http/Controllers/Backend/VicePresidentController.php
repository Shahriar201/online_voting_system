<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VotePurpose;
use App\Model\Candidate;
use App\Model\Category;
use Auth;

class VicePresidentController extends Controller
{
    public function view(){
        $allData = Candidate::where('category_id', '2')->get();
        return view('backend.vice_president.view-vice_president-candid', compact('allData'));
    }

    public function add(){
        // $data['categories'] = Category::all();
        $data['vote_purposes'] = VotePurpose::all();
        return view('backend.vice_president.add-vice_president-candid', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        $candidate = new Candidate();
        $candidate->vote_purpose_id = $request->vote_purpose_id;
        $candidate->category_id = '2';
        $candidate->name = $request->name;
        $candidate->created_by = Auth::user()->id;
        $candidate->save();

        return redirect()->route('candidates.vicepresident.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData['candidates'] = Candidate::find($id);
        $editData['vote_purposes'] = VotePurpose::find($id);
        // dd($editData['vote_purposes']);
        return view('backend.vice_president.add-vice_president-candid', $editData);
    }

    public function update(Request $request, $id){
        $candidate = Candidate::find($id);
        $candidate->vote_purpose_id = $request->vote_purpose_id;
        $candidate->name = $request->name;
        $candidate->updated_by = Auth::user()->id;
        $candidate->save();

        return redirect()->route('candidates.vicepresident.view')->with('success', 'Data updated successfully');

    }

    public function delete($id){
        $candidate = Candidate::find($id);
        $candidate->delete();

        return redirect()->route('candidates.vicepresident.view')->with('success', 'Data deleted successfully');
    }
}
