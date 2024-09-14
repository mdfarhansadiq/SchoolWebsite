<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassNumber extends Model
{
    use HasFactory;

    public function classSections()
    {
        return $this->hasMany(ClassSection::class, 'class_number_id');
    }

    public function onlineClassVideoLinks()
    {
        return $this->hasMany(OnlineClassVideoLink::class, 'class_number_id');
    }

    public function lectureNoteFiles()
    {
        return $this->hasMany(LectureNoteFile::class, 'class_number_id');
    }
}
