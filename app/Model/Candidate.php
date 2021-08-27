<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function vote_purpose(){
        return $this->belongsTo(VotePurpose::class, 'vote_purpose_id', 'id');
    }
}
