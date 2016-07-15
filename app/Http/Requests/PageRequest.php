<?php

namespace Reflex\Scorpio\Http\Requests;

use Reflex\Scorpio\Http\Requests\Request;

class PageRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function all()
    {
        $all = parent::all();

        if (isset($all['slug']) && strlen($all['slug'])) {
            $all['slug'] = str_slug($all['slug']);
        } else {
            $all['slug'] = isset($all['title']) && strlen($all['title'])
                ? str_slug($all['title'])
                : '';
        }

        return $all;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($page = $this->route()->getParameter('page')) {
            $id = $page->id;
            return [
                'title' => 'required',
                'slug'  => 'unique:pages,id,' . $id,
                'body'  => 'required',
                'active'=> 'boolean',
            ];
        }

        return [
            'title' => 'required',
            'slug'  => 'unique:pages',
            'body'  => 'required',
            'active'=> 'boolean',
        ];
    }
}
