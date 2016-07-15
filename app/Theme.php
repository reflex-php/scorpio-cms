<?php

namespace Reflex\Scorpio;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['name', 'path'];

    public function pagesAssociated()
    {
        return $this->pages->count();
    }

    public function getFullPathAttribute()
    {
        $format = "/%s/";
        $path = $this->path;
        $fullPath = vsprintf($format, compact('path'));

        return resource_path('layouts') . strtolower($fullPath);
    }

    public function getOriginalFullPathAttribute()
    {
        $format = "/%s/";
        $path = $this->getOriginal('path');
        $fullPath = vsprintf($format, compact('path'));

        return resource_path('layouts') . strtolower($fullPath);
    }

    public function setPathAttribute($value)
    {
        $this->attributes['path'] = str_slug($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['path'] = str_slug($value);
        $this->attributes['name'] = $value;
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'theme_id');
    }

    public static function latestTen()
    {
        return static::latest()->limit(10)->get();
    }
}
