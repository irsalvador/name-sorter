<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface SorterInterface
 *
 * Defines a contract for sorting a list of items (names).
 */
interface SorterInterface
{
    /**
     * Sorts a list of items and returns the sorted array.
     *
     * @param string[] $items Array of items to sort
     * @return string[] Sorted items
     */
    public function sort(array $items): array;
}