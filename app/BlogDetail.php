<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
