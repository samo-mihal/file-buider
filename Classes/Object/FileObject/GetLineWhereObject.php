<?php
namespace Digitalwerk\FileBuilder\Object\FileObject;

use Digitalwerk\FileBuilder\Object\AbstractFileObject;
use Digitalwerk\FileBuilder\Object\FileObject;

/**
 * Class GetLineWhereObject
 * @package Digitalwerk\FileBuilder\Object\FileObject
 */
class GetLineWhereObject extends AbstractFileObject
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
     * @return int|null
     */
    public function isString(string $name): ? int
    {
        if ($this->file->getLines()) {
            $iterator = 0;
            foreach ($this->file->getLines() as $line) {
                if (strpos($line,$name) !== false) {
                    return $iterator;
                    break;
                }
                $iterator++;
            }
        }
        return null;
    }
}
