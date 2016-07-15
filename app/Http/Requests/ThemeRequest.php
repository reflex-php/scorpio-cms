<?php

namespace Reflex\Scorpio\Http\Requests;

use Reflex\Scorpio\Http\Requests\Request;

class ThemeRequest extends Request
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
        if ($theme = $this->route()->getParameter('theme')) {
            $id = $theme->id;
            return [
                'name' => 'required|unique:themes,id,' . $id,
            ];
        }

        return [
            'name' => 'required|unique:themes',
        ];
    }
}
