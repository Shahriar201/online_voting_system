<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VotePurpose;
use App\Http\Requests\VoteRequest;
use Auth;

class VoteController extends Controller
{
    public function view(){

        $data['allData'] = VotePurpose::all();
        
        return view('backend.vote_purpose.view-vote-purpose', $data);
    }

    public function add(){
    
        return view('backend.vote_purpose.add-vote-purpose');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|unique:vote_purposes,name'
        ]);
        $data = new VotePurpose();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();

        return redirect()->route('votes.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData = VotePurpose::find($id);

        return view('backend.vote_purpose.add-vote-purpose', compact('editData'));
    }

    public function update(VoteRequest $request, $id){
        $data = VotePurpose::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->save();

        return redirect()->route('votes.view')->with('success', 'Data updated successfully');

    }

    public function delete($id){
        $purpose = VotePurpose::find($id);
        $purpose->delete();

        return redirect()->route('votes.view')->with('success', 'Data deleted successfully');
    }
}
