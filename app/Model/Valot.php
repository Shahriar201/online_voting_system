<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Valot extends Model
{
    public function vote_purpose(){
        return $this->belongsTo(VotePurpose::class, 'vote_purpose_id', 'id');
    }
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
    
    public function nomination(){
        return $this->belongsTo(Nomination::class, 'nomination_id', 'id');
    }
}
