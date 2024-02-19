<?php

namespace App\Models;

use CodeIgniter\Model;

class Purchased extends Model
{
    protected $table            = 'purchased';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name','price','status','course_id'];
}