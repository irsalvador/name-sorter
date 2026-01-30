<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface ReaderInterface
 *
 * Defines a contract for reading a list of items (names) from a source.
 */
interface ReaderInterface
{
    /**
     * Reads items from a source.
     *
     * @param string $source Path or identifier of the source
     * @return string[] List of items read
     */
    public function read(string $source): array;
}