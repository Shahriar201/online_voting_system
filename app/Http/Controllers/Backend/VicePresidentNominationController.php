<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Nomination;
use App\Model\Candidate;
use Auth;

class VicePresidentNominationController extends Controller
{
    public function view(){
        $allData = Nomination::where('category_id', '2')->get();
        return view('backend.nomination.view-vice_president-nomination', compact('allData'));
    }

    public function add(){
        $data['candidates'] = Candidate::where('category_id', '2')->get();
        return view('backend.nomination.add-vice_president-nomination', $data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:nominations,name'
        ]);
        $nomination = new Nomination();
        $nomination->category_id = '2';
        $nomination->candidate_id = $request->candidate_id;
        $nomination->name = $request->name;
        $nomination->created_by = Auth::user()->id;
        $nomination->save();

        return redirect()->route('nominations.vicepresident.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Nomination::find($id);
        $data['candidates'] = Candidate::all();

        return view('backend.nomination.add-vice_president-nomination', $data);
    }

    public function update(Request $request, $id){
        $nomination = Nomination::find($id);
        $nomination->candidate_id = $request->candidate_id;
        $nomination->name = $request->name;
        $nomination->updated_by = Auth::user()->id;
        $nomination->save();

        return redirect()->route('nominations.vicepresident.view')->with('success', 'Data updated successfully');

    }

    public function delete($id){
        $nomination = Nomination::find($id);
        $nomination->delete();

        return redirect()->route('nominations.vicepresident.view')->with('success', 'Data deleted successfully');
    }
}
