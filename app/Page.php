<?php

namespace Reflex\Scorpio;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use NodeTrait;

    protected $fillable = ['title', 'body', 'theme_id', 'uri', 'route_name', 'active', 'excerpt'];

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

    public function updateOrder($order, $orderPage)
    {
        $orderPage = $this->findOrFail($orderPage);

        switch ($order) {
            case 'before':
                $this->insertBeforeNode($orderPage);
                break;
            case 'after':
                $this->insertAfterNode($orderPage);
                break;
            case 'childOf':
                $orderPage->prependNode($this);
                break;
        }
    }

    public function activate()
    {
        $this->active = true;
        return $this->save();
    }

    public function deactivate()
    {
        $this->active = false;

        return $this->save();
    }
}
