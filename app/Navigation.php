<?php

namespace Reflex\Scorpio;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function children()
    {
        return static::where('parent_id', $this->id);
    }
}
