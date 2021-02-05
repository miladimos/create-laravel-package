<?php

namespace App\Services;

use ZipArchive;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

final class PackageTemplateService
{

    public function name($name)
    {
        return Str::snake($name, '-');
    }

    public function download($url)
    {
        $response  = Http::retry(3, 100)->get($url);

        if ($response->ok() && $response->successful()) {

            try {
                Storage::put("template.zip", $response);
            } catch (Exception $e) {
                throw $e->getMessage();
            }
            return true;
        }

        return false;
    }

    public function extract($templatePath, $extractTo)
    {
        $zip = new ZipArchive();
        if ($zip->open($templatePath, ZipArchive::OVERWRITE) === true) {
            $zip->extractTo($extractTo);
            $zip->close();
            return true;
        } else {
            return false;
        }
    }
}
