<?php


namespace App\CoreMechanism;

/**
 * Manipulation of files
 */

class Files
{
    function upload_file($file, $dir = '')
    {

        if(empty($dir))
        {
            $dir_name = '/public/';
        }
        else
        {
            $dir_name = '/public/'.$dir;
        }

        // Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();

        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get just ext
        $extension = $file->getClientOriginalExtension();
        $validExtensions = array("jpeg", "jpg", "png", "pdf", "doc","docx");

        // Filename to store
        $fileNameToStore= str_replace(' ', '-', $filename).'_'.uniqid().'_'.time().'.'.$extension;

        // Upload Image
        if(! in_array(strtolower($extension), $validExtensions))
        {
            return 'file_not_valid';
        }
        else
        {
            $file->storeAs($dir_name, $fileNameToStore);
        }

        return $fileNameToStore;
    }
}
