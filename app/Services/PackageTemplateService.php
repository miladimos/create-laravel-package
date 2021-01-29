<?php

namespace App\Services;

use ZipArchive;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PackageTemplateService
{

    public function name($name)
    {
        return Str::snake($name, '-');
    }

    public function download($url)
    {
        $response  = Http::retry(3, 100)->get($url);

        if ($response->ok() && $response->successful) {
            return true;
            Storage::put("template.zip", $response);
        }

        return false;
    }

    public function extract($path)
    {
        $zip = new ZipArchive;
        if ($zip->open($path) === true) {
            $zip->extractTo('/my/destination/dir/');
            $zip->close();
            return true;
        } else {
            return false;
        }
    }
}
