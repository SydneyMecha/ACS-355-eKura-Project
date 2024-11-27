<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateFactory> */
    use HasFactory;

    protected $fillable = [
        'ballot_id',
        'candidate_name',
        'party',
        'bio',
        'status'
    ];

    protected $table = 'candidates';

    public function ballot()
    {
        return $this->belongsTo(Ballot::class);
    }

}
