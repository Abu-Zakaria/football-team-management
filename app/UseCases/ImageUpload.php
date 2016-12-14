<?php
namespace App\UseCases;

class ImageUpload
{
    public static function perform($request, $path, $pic_name)
    {
        $file_name = $_FILES[$request]['tmp_name'];

        move_uploaded_file($file_name, "$path/$pic_name");
    }
}