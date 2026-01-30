<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface WriterInterface
 *
 * Defines a contract for writing a list of items (names) to a destination.
 */
interface WriterInterface
{
    /**
     * Writes items to a destination.
     *
     * @param string[] $items Array of items to write
     * @param string $destination Path to the destination file
     */
    public function write(array $items, string $destination): void;
}