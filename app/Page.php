<?php

namespace Reflex\Scorpio;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'body', 'theme_id', 'slug'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function theme()
    {
        return $this->hasOne(Theme::class, 'id', 'theme_id');
    }

    public static function notUsing(Theme $theme)
    {
        return static::where('id', '!=', $theme->id)->get();
    }

    public static function latestFiveUpdated()
    {
        return static::latest('updated_at')->limit(5)->get();
    }
}
