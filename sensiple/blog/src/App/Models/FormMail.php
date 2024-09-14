<?php

namespace Sensiple\Blog\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormMail extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'form_id',
        'form_values',
        'submited_date_time'
    ];
}
