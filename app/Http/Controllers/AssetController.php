<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Theme;
use Illuminate\Http\Request;
use Reflex\Scorpio\Http\Requests;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function show(Theme $themeByDirectory, $filename = '')
    {
        $disk = Storage::disk('layouts');
        if (! $disk->exists($path = $themeByDirectory->path)) {
            return response("File '$path' not found", 404);
        }

        $format = "%s/%s";
        $fullPath = vsprintf($format, compact('path', 'filename'));

        if (! $disk->exists($fullPath)) {
            return response("File '$fullPath' not found", 404);
        }

        $file = $disk->get($fullPath);
        $type = pathinfo($fullPath)['extension'];
        $mime = null;

        switch ($type) {
            case 'html':
                $mime = 'text/html';
                break;
            case 'js':
            case 'json':
                $mime = 'text/javascript';
                break;
            case 'css':
                $mime = 'text/css';
                break;
            case 'png':
                $mime = 'image/png';
                break;
            case 'jpg':
            case 'jpeg':
                $mime = 'image/jpeg';
                break;
        }

        $headers = [];

        // set the Content-type header
        if ($mime) {
            $headers['Content-Type'] = $mime;
        }
        
        return response($file, 200, $headers);
    }
}
