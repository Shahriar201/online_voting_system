<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Candidate;
use App\Model\Category;
use App\Model\VotePurpose;
use App\Model\Nomination;
use App\Model\Valot;
use Auth;

class ValotController extends Controller
{
    public function view(){
        $allData['valots'] = Valot::all();
        $allData['vote_purposes'] = VotePurpose::all();
        $allData['categories'] = Category::all();
        $allData['candidates'] = Candidate::all();
        // dd($allData);
        return view('backend.valot.view-valot-paper', $allData);
    }

    public function add(){
        $allData['valots'] = Valot::all();
        $allData['vote_purposes'] = VotePurpose::all();
        $allData['categories'] = Category::all();
        $allData['candidates'] = Candidate::where('category_id', '');
        return view('backend.valot.add-valot-paper', $allData);
    }

    public function store(Request $request){
        $valot = new Valot();
        $valot->date = date('Y-m-d', strtotime($request->date));
        $valot->vote_purpose_id = $request->vote_purpose_id;
        $valot->category_id = $request->category_id;
        $valot->candidate_id = $request->candidate_id;
        $valot->result = '1';
        // $valot->created_by = Auth::user()->id;
        $valot->save();

        return redirect()->route('valots.add')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData = Candidate::find($id);
        return view('backend.vice_president.add-vice_president-candid', compact('editData'));
    }

    public function update(Request $request, $id){
        $candidate = Candidate::find($id);
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

    public function getCandidate(Request $request){
        // dd('Ok');
        $category_id = $request->category_id;
        // dd($category_id);
        $allCandidate = Candidate::where('category_id', $category_id)->get();
        // dd($allCandidate->toArray());
        return response()->json($allCandidate);
    }
}
