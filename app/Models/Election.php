<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    /** @use HasFactory<\Database\Factories\ElectionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_datetime',
        'end_datetime',
        'status'
    ];

    protected $table = 'elections';

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
    ];

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }

}
