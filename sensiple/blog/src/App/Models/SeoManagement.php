<?php

namespace Sensiple\Blog\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeoManagement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'seo_managements';
}
