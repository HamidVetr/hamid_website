<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'parent_folder_id',
        'current_name',
        'previous_name',
        'created_by',
        'updated_by',
        'number_of_files',
        'size',
        'permission',
    ];

    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_folder_id');
    }

    public function parents()
    {
        return $this->parent()->with('parents');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
