<?php
namespace Digitalwerk\FileBuilder\Render;

use Digitalwerk\FileBuilder\Object\AbstractFileObject;
use Digitalwerk\FileBuilder\Object\FileObject;

/**
 * Class FileRender
 * @package Digitalwerk\FileBuilder\Render
 */
class FileRender extends AbstractFileObject
{
    /**
     * FileRender constructor.
     * @param FileObject $file
     */
    public function __construct(FileObject $file)
    {
        parent::__construct($file);
    }

    public function render() {
        if ($this->file->getFilename()) {
            $filePath = explode('/', $this->file->getFilename());
            array_pop($filePath);
            $fileDirectory = implode('/', $filePath);
            if (!file_exists($fileDirectory)) {
                mkdir($fileDirectory, 0777, true);
            }
            file_put_contents(
                $this->file->getFilename(),
                implode('', $this->file->getLines())
            );
        }
    }
}
