<?php
namespace Digitalwerk\FileBuilder\Object\FileObject\ImportString;

use Digitalwerk\FileBuilder\Object\AbstractFileObject;
use Digitalwerk\FileBuilder\Object\FileObject;

/**
 * Class StringPositionObject
 * @package Digitalwerk\FileBuilder\Object\FileObject\ImportString
 */
class StringPositionObject extends AbstractFileObject
{
    /**
     * @var int
     */
    private $line = 0;

    /**
     * @var string
     */
    private $newString = '';

    /**
     * Contains constructor.
     * @param FileObject $file
     * @param int $line
     * @param string $string
     */
    public function __construct(FileObject $file, int $line, string $string)
    {
        parent::__construct($file);
        $this->setLine($line);
        $this->setNewString($string);
    }

    /**
     * @param string $string
     * @return void
     */
    public function afterString(string $string)
    {
        $pos = strpos($this->file->getLines()[$this->getLine()], $string) + 1;
        $this->importStringAfterSpecificPosition($this->getNewString(), $pos);
    }

    /**
     * @param string $string
     * @return void
     */
    public function beforeString(string $string)
    {
        $pos = strpos($this->file->getLines()[$this->getLine()], $string) - 1;
        $this->importStringAfterSpecificPosition($this->getNewString(), $pos);
    }

    /**
     * @param string $newString
     * @param int $position
     */
    private function importStringAfterSpecificPosition(string $newString, int $position)
    {
        $lines = $this->file->getLines();
        $lines[$this->getLine()] = substr($lines[$this->getLine()], 0, $position) .
            $newString .
            substr($lines[$this->getLine()], $position);
        $this->file->setLines($lines);
    }

    /**
     * @return int
     */
    private function getLine(): int
    {
        return $this->line;
    }

    /**
     * @param int $line
     */
    private function setLine(int $line): void
    {
        $this->line = $line;
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
}
