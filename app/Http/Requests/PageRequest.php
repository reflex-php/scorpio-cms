<?php

namespace Reflex\Scorpio\Http\Requests;

use Reflex\Scorpio\Page;
use Baum\MoveNotPossibleException;
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
                'title'      => 'required',
                'uri'        => 'unique:pages,id,' . $id,
                'body'       => 'required',
                'active'     => 'boolean',
                'order'      => 'in:,before,after,childOf',
                'order_page' => 'exists:pages,id,active,1',
            ];
        }

        return [
            'title'      => 'required',
            'uri'        => 'unique:pages',
            'body'       => 'required',
            'active'     => 'boolean',
            'order'      => 'in:,before,after,childOf',
            'order_page' => 'exists:pages,id,active,1',
        ];
    }

    protected function updatePageOrder(Page $page)
    {
        if (! $this->has('order', 'order_page')) {
            return true;
        }

        $page->updateOrder($this->order, $this->order_page);

        return true;
    }

    public function persist(Page $page = null)
    {
        if (!! $page && $page->exists) {
            $page->update($this->all());
        } else {
            $page = Page::create($this->all());
        }

        $this->updatePageOrder($page);

        return $page;
    }
}
