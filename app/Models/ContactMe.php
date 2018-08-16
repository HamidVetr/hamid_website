<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Facades\jDate;

class ContactMe extends Model
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read',
    ];

    /**
     * @return bool|string
     */
    public function create_date()
    {
        return jDate::forge($this->created_at)->format('%d %B %Y');
    }
}
