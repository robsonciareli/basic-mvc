<?php

namespace app\classes;

use app\classes\Upload;

class UploadFile extends Upload
{
    public function __construct(private array $file, private string $target_dir = 'uploads/')
    {
        parent::__construct($file, $target_dir);

        parent::setExtensionsAllowed(['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt']);
    }
}