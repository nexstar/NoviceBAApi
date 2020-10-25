<?php

namespace App\Tool;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PictureService
{
    private $StorageImages;

    public function __construct()
    {
        $this->StorageImages = Storage::disk('images');
    }

    public function Compute($GuidImagesName, $Base64)
    {
        //$CutStr = strpos($Base64, ',');
        //$pic = (mb_substr($Base64, ($CutStr + 1), strlen($Base64), "utf-8"));
        // $Base64Decode = base64_decode($pic);

        $this->StorageImages->put($GuidImagesName, $Base64);
    }

    public function reduction($DirPath, $Guid)
    {
        try {
            return $this->StorageImages->get('.txt');
        } catch (FileNotFoundException $e) {
            Log::info($e->getMessage());
        }
        return '#';
        // return ('data:image/png;base64,' . base64_encode($data));
    }

    /**
     * @param $StrName
     * @return void
     */
    public function RmPicture($StrName)
    {
        $this->StorageImages->delete($StrName);
    }

}
