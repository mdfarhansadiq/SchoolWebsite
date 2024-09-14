<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    use HasFactory;


    public function classNumber()
    {
        return $this->belongsTo(ClassNumber::class, 'class_number_id');
    }

    public function onlineClassVideoLinks()
    {
        return $this->hasMany(OnlineClassVideoLink::class, 'class_section_id');
    }

    public function lectureNoteFiles()
    {
        return $this->hasMany(LectureNoteFile::class, 'class_section_id');
    }
}
