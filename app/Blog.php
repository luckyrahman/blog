<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blog_detail()
    {
        return $this->hasOne(BlogDetail::class);
    }
}
