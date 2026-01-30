<?php

namespace NameSorter;

use App\Services\NameReader;
use App\Services\NameSorter;
use App\Services\NameWriter;

/**
 * Class Application
 *
 * Orchestrates the Name Sorter services:
 * reading names from a file, sorting them, and writing the output.
 *
 * @package NameSorter
 */
class Application
{
    /**
     * Array of loaded names.
     *
     * @var string[]
     */
    private array $names = [];

    /**
     * Load names from a file using the NameReader service.
     *
     * @param string $filePath Path to the input file
     * @throws \InvalidArgumentException If the file is not readable
     */
    public function loadFromFile(string $filePath): void
    {
        $reader = new NameReader();
        $this->names = $reader->read($filePath);
    }

    /**
     * Load names from an array (for testing or interactive input).
     *
     * @param string[] $names
     */
    public function loadFromArray(array $names): void
    {
        $this->names = $names;
    }

    /**
     * Sort names using the NameSorter service.
     *
     * @return string[] Sorted array of names
     */
    public function sortNames(): array
    {
        $sorter = new NameSorter();
        return $sorter->sort($this->names);
    }

    /**
     * Output sorted names using the NameWriter service.
     *
     * @param string $outputFile Optional output file name. Defaults to 'sorted-names-list.txt'.
     */
    public function outputSortedNames(string $outputFile = 'sorted-names-list.txt'): void
    {
        $writer = new NameWriter();
        $writer->write($this->sortNames(), $outputFile);
    }

    /**
     * Get the loaded names without sorting.
     *
     * @return string[]
     */
    public function getNames(): array
    {
        return $this->names;
    }
}
