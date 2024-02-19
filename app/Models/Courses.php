<?php

namespace App\Models;

use CodeIgniter\Model;

class Courses extends Model
{
    protected $table            = 'courses';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name','description','image','price','purchased'];

}
