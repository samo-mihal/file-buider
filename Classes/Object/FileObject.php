<?php
namespace Digitalwerk\FileBuilder\Object;

use Digitalwerk\FileBuilder\Object\FileObject\ContainsObject;
use Digitalwerk\FileBuilder\Object\FileObject\GetLineWhereObject;
use Digitalwerk\FileBuilder\Object\FileObject\ImportStringObject;
use Digitalwerk\FileBuilder\Render\FileRender;

/**
 * Class FileObject
 * @package Digitalwerk\FileBuilder\Object
 */
class FileObject
{
    /**
     * FileObject constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->setFilename($filename);
        if ($filename && file_exists($filename)) {
            $this->setLines(file($this->getFilename()));
            $this->setFileInStringFormat(implode('', $this->getLines()));
        } else {
            throw new \InvalidArgumentException('File does not exist');
        }
    }

    /**
     * @var string
     */
    protected $filename = '';

    /**
     * @var string
     */
    protected $fileInStringFormat = '';

    /**
     * @var array
     */
    protected $lines = [];

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return array
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @param array $lines
     */
    public function setLines(array $lines): void
    {
        $this->lines = $lines;
    }

    /**
     * @return string
     */
    public function getFileInStringFormat(): string
    {
        return $this->fileInStringFormat;
    }

    /**
     * @param string $fileInStringFormat
     */
    public function setFileInStringFormat(string $fileInStringFormat): void
    {
        $this->fileInStringFormat = $fileInStringFormat;
    }

    /**
     * @return ContainsObject
     */
    public function contains(): ? ContainsObject
    {
        return new ContainsObject($this);
    }

    /**
     * @param $string
     * @return ImportStringObject|null
     */
    public function importString($string): ? ImportStringObject
    {
        return new ImportStringObject($this, $string);
    }

    /**
     * @return GetLineWhereObject
     */
    public function getLineWhere(): GetLineWhereObject
    {
        return new GetLineWhereObject($this);
    }

    /**
     * @return void
     */
    public function render(): void
    {
        $fileRender = new FileRender($this);
        $fileRender->render();
    }
}
