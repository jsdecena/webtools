<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    const FILLABLES = [
        'description',
        'employee_id'
    ];

    public $fillable = self::FILLABLES;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
