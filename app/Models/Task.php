<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'due_date', 'priority_id'];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function priority()
{
    return $this->belongsTo(Priority::class);
}

public function notes()
{
    return $this->hasMany(Note::class);
}

}

