<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
