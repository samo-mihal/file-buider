<?php
namespace Digitalwerk\FileBuilder\Object\FileObject;

use Digitalwerk\FileBuilder\Object\AbstractFileObject;
use Digitalwerk\FileBuilder\Object\FileObject;

/**
 * Class ContainsObject
 * @package Digitalwerk\FileBuilder\Object\FileObject
 */
class ContainsObject extends AbstractFileObject
{
    /**
     * Contains constructor.
     * @param FileObject $file
     */
    public function __construct(FileObject $file)
    {
        parent::__construct($file);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function string(string $name): bool
    {
        if ($this->file->getLines()) {
            foreach ($this->file->getLines() as $line) {
                if (strpos($line,$name) !== false) {
                    return true;
                    break;
                }
            }
        }
        return false;
    }
}
