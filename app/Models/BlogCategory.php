<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }


    public function getParent()
    {
        if ($this->parent_category > 0) {
            return BlogCategory::find($this->parent_category)->getParent();
        } else {
            return $this;
        }
    }
}
