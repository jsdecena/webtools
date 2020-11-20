<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    const FILLABLES = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'active'
    ];

    public $fillable = self::FILLABLES;

    public function getGenderAttribute($value)
    {
        return strtoupper($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
