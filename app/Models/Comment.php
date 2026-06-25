<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['author_name', 'body', 'issue_id'];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
