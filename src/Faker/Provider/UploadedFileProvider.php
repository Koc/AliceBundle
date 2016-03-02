<?php

namespace Hautelook\AliceBundle\Faker\Provider;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadedFileProvider
{
    public static function uploadedFile($filePath, $originalName = null)
    {
        $tmpFilePath = tempnam(sys_get_temp_dir(), 'alice-');
        copy($filePath, $tmpFilePath);

        if (null === $originalName) {
            $originalName = basename($filePath);
        }

        //TODO: register shutdown function for removing

        return new UploadedFile($tmpFilePath, $originalName, null, null, null, true);
    }
}
