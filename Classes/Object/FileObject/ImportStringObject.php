<?php
namespace Digitalwerk\FileBuilder\Object\FileObject;

use Digitalwerk\FileBuilder\Object\AbstractFileObject;
use Digitalwerk\FileBuilder\Object\FileObject;

/**
 * Class ImportStringObject
 * @package Digitalwerk\FileBuilder\Object\FileObject
 */
class ImportStringObject extends AbstractFileObject
{
    /**
     * @var string
     */
    private $newString = '';

    /**
     * Contains constructor.
     * @param FileObject $file
     * @param string $string
     */
    public function __construct(FileObject $file, string $string)
    {
        parent::__construct($file);
        $this->setNewString($string);
    }

    /**
     * @param int $line
     * @return void
     */
    public function afterLine(int $line): void
    {
        $this->file->setLines(
            $this->arrayInsertAfter($this->file->getLines(), $line, [$this->getNewString()])
        );
    }

    /**
     * @param int $line
     * @return void
     */
    public function beforeLine(int $line): void
    {
        $this->file->setLines(
            $this->arrayInsertAfter($this->file->getLines(), $line - 2, [$this->getNewString()])
        );
    }

    /**
     * @param int $line
     * @return ImportString\StringPositionObject
     */
    public function inLine(int $line): ImportString\StringPositionObject
    {
        return new FileObject\ImportString\StringPositionObject($this->file, $line, $this->getNewString());
    }

    /**
     * @return string
     */
    private function getNewString(): string
    {
        return $this->newString;
    }

    /**
     * @param string $newString
     */
    private function setNewString(string $newString): void
    {
        $this->newString = $newString;
    }

    /**
     * @param array $array
     * @param $key
     * @param array $new
     * @return array
     */
    private function arrayInsertAfter(array $array, $key, array $new)
    {
        $keys = array_keys($array);
        $index = array_search($key, $keys);
        $pos = false === $index ? count($array) : $index + 1;
        return array_merge(array_slice($array, 0, $pos), $new, array_slice($array, $pos));
    }
}
