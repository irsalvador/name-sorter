<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ReaderInterface;

/**
 * Class NameReader
 *
 * Failing implementation for TDD.
 */
class NameReader implements ReaderInterface
{
    /**
     * Attempt to read names from a file.
     * Currently returns an empty array to fail the tests.
     *
     * @param string $filePath
     * @return string[]
     */
    public function read(string $filePath): array
    {
        // FAILING IMPLEMENTATION: always returns empty array
        return [];
    }
}