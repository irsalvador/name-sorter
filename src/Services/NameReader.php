<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ReaderInterface;

/**
 * Class NameReader
 *
 * Reads a list of names from a file.
 */
class NameReader implements ReaderInterface
{
    /**
     * Reads names from a file.
     *
     * @param string $filePath Path to the file
     * @return string[] Array of names
     *
     * @throws \RuntimeException if file is not readable
     */
    public function read(string $filePath): array
    {
        if (!is_readable($filePath)) {
            throw new \RuntimeException("File not readable: {$filePath}");
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        return array_map('trim', $lines);
    }
}
