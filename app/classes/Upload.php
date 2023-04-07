<?php

namespace app\classes;

class Upload
{
    private array $extensionsAllowed;

    public function __construct(private array $file, private string $target_dir = 'uploads/')
    {
    }

    public function moveFileToTargetDir() : void
    {
        $this->completeTargetDir();
        if(!file_exists($this->target_dir)){
            $this->directoryCreator();
        }

        move_uploaded_file($this->file['tmp_name'], $this->mountTargetFile());
    }

    protected function getFileType() : string
    {
        return strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
    }

    protected function mountTargetFile() : string
    {
        return $this->target_dir . $this->file['name'];
    }

    protected function completeTargetDir() : void
    {
        if(!str_ends_with($this->target_dir, '/')){
            $this->target_dir = $this->target_dir.'/';
        }
        $this->target_dir = IMAGES . $this->target_dir;
    }

    protected function directoryCreator() : void
    {
        mkdir($this->target_dir, 0777, true);
    }

    public function setExtensionsAllowed(array $extensionsAllowed){
        foreach($extensionsAllowed as $extension){
            $allowed[] = $extension;
        }
        $this->extensionsAllowed = $allowed;
    }

    public function getExtesionsAllowed()
    {
        return $this->extensionsAllowed;
    }

    public function getFileName() : string
    {
        return $this->file['name'];
    }
}