<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureNoteFile extends Model
{
    use HasFactory;


    public function classNumber()
    {
        return $this->belongsTo(ClassNumber::class);
    }

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class);
    }
}
