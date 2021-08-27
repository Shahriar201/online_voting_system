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

class ResultController extends Controller
{
    public function view(){
        $vote_purposes = VotePurpose::where('id', 1)->get();
        // dd($vote_purposes->toArray());
        $categories = Category::all();
        // dd($categories->toArray());
        // $nominations = Nomination::where('category_id', 1)->get();
        // $nominations = Nomination::orderBy('id', 'asc')->with(['category'])->get();
        // dd($nominations->toArray());
        // $valots = Valot::where('vote_purpose_id', 1)->where('nomination_id', $nominations->id)->where('category_id', $categories->id)->get();
        $candidates = Candidate::where('vote_purpose_id', 1)->get();
        // dd($candidates->toArray());
        $valots = Valot::where('vote_purpose_id', 1)->with(['category'])->get();
        // dd($valots->toArray());
        // dd($nominations->toArray());

        return view('backend.results.view-vote-results', compact('valots', 'vote_purposes', 'categories', 'candidates'));
    }
}
