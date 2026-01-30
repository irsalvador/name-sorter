<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\WriterInterface;

/**
 * Class NameWriter
 *
 * Failing implementation for TDD.
 */
class NameWriter implements WriterInterface
{
    /**
     * Attempt to write names to file.
     * Currently does nothing to fail the tests.
     *
     * @param string[] $names
     * @param string $filePath
     */
    public function write(array $names, string $filePath): void
    {
        // FAILING IMPLEMENTATION: does nothing
    }
}