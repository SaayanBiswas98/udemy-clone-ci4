<?php

namespace App\Models;

use CodeIgniter\Model;

class Chapter extends Model
{
    protected $table            = 'chapters';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'price', 'description','video','course_id','view_status','play_status','track'];

}