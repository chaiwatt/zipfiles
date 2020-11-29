<?php
namespace App\Http\Controllers;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ZipController extends Controller
{
    public function DownloadZip(){
        $zip = new ZipArchive();
        $fileName = 'fulltbp29112020.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('myfiles'));
            foreach($files as $key => $file){
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $download_file = file_get_contents($file);
                $zip->addFromString(basename($file), $download_file);
                $zip->renameName(basename($file), 'ไฟล์'.$key.'.'.$extension);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }
}
