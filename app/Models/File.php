<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'folder_id',
        'current_name',
        'previous_name',
        'downloads',
        'views',
        'created_by',
        'updated_by',
        'path',
        'size',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
