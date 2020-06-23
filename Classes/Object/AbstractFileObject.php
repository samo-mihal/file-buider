<?php
namespace Digitalwerk\FileBuilder\Object;

/**
 * Class AbstractFileObject
 * @package Digitalwerk\FileBuilder\Object
 */
abstract class AbstractFileObject
{
    /**
     * @var FileObject
     */
    protected $file = null;

    /**
     * AbstractFileObject constructor.
     * @param FileObject $file
     */
    public function __construct(FileObject $file)
    {
        $this->setFile($file);
    }

    /**
     * @param FileObject $file
     */
    private function setFile(FileObject $file): void
    {
        $this->file = $file;
    }
}
