<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    /** @use HasFactory<\Database\Factories\BallotFactory> */
    use HasFactory;

    protected $fillable = [
        'election_id',
        'ballot_name',
        'ballot_description',
        'ballot_status',
    ];

    protected $table = 'ballots';
}
