<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\WriterInterface;

/**
 * Class NameWriter
 *
 * Writes a list of names to a file and prints them to console.
 */
class NameWriter implements WriterInterface
{
    /**
     * Writes names to a file and prints them.
     *
     * @param string[] $names Array of names
     * @param string $filePath Path to the output file
     */
    public function write(array $names, string $filePath): void
    {
        $content = implode(PHP_EOL, $names) . PHP_EOL;
        file_put_contents($filePath, $content);

        foreach ($names as $name) {
            echo $name . PHP_EOL;
        }
    }
}
