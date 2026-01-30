<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\SorterInterface;

/**
 * Class NameSorter
 *
 * Sorts a list of names by last name, then given names.
 */
class NameSorter implements SorterInterface
{
    /**
     * Sorts a list of names by last name and then given names.
     *
     * @param string[] $names Array of names to sort
     * @return string[] Sorted array
     */
    public function sort(array $names): array
    {
        usort($names, function (string $a, string $b): int {
            [$aGiven, $aLast] = $this->splitName($a);
            [$bGiven, $bLast] = $this->splitName($b);

            // Compare by last name first, then given names
            return $aLast <=> $bLast ?: $aGiven <=> $bGiven;
        });

        return $names;
    }

    /**
     * Splits a full name into given names and last name.
     *
     * @param string $name Full name
     * @return string[] [givenNames, lastName]
     */
    private function splitName(string $name): array
    {
        $parts = explode(' ', $name);
        $lastName = array_pop($parts);
        $givenNames = implode(' ', $parts);

        return [$givenNames, $lastName];
    }
}
