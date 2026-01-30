<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class NameSorter
 *
 * Responsible for sorting a list of names by:
 *  1. Last name
 *  2. Given names (if last names are equal)
 *
 * This class focuses purely on sorting logic and has no
 * knowledge of input or output mechanisms.
 */
class NameSorter
{
    /**
     * Sorts an array of names by last name, then given names.
     *
     * @param string[] $names List of full names to be sorted
     * @return string[] Sorted list of names
     */
    public function sort(array $names): array
    {
        return [];
    }
}