<?php

namespace NameSorter;

/**
 * Class Application
 *
 * Handles loading, sorting, and outputting names for the Name Sorter project.
 *
 * @package NameSorter
 */
class Application
{
    /**
     * Array of names to sort.
     *
     * @var string[]
     */
    private array $names = [];

    /**
     * Load names from a file.
     *
     * @param string $filePath Path to the file containing names, one per line.
     * @throws \InvalidArgumentException If the file does not exist.
     */
    public function loadFromFile(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("File not found: $filePath");
        }

        $contents = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->names = array_map('trim', $contents);
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
     * Sort names alphabetically (case-insensitive).
     *
     * @return string[] Sorted array of names.
     */
    public function sortNames(): array
    {
        $names = $this->names;
        sort($names, SORT_STRING | SORT_FLAG_CASE);
        return $names;
    }

    /**
     * Output sorted names to standard output.
     */
    public function outputSortedNames(): void
    {
        foreach ($this->sortNames() as $name) {
            echo $name . PHP_EOL;
        }
    }

    /**
     * Get the loaded names.
     *
     * @return string[]
     */
    public function getNames(): array
    {
        return $this->names;
    }
}
