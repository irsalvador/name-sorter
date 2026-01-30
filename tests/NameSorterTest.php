<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\NameSorter;

/**
 * Class NameSorterTest
 *
 * Unit tests for the NameSorter service.
 * Verifies correct sorting of names by last name, then given names.
 */
final class NameSorterTest extends TestCase
{
    private NameSorter $sorter;

    /**
     * Set up NameSorter instance before each test.
     */
    protected function setUp(): void
    {
        $this->sorter = new NameSorter();
    }

    /**
     * Test sorting a list of names with various last and given names.
     */
    public function test_it_sorts_names_by_last_name_then_given_names(): void
    {
        $input = [
            'Janet Parsons',
            'Vaughn Lewis',
            'Adonis Julius Archer',
            'Shelby Nathan Yoder',
            'Marin Alvarez',
            'London Lindsey',
            'Beau Tristan Bentley',
            'Leo Gardner',
            'Hunter Uriah Mathew Clarke',
            'Mikayla Lopez',
            'Frankie Conner Ritter',
        ];

        $expected = [
            'Marin Alvarez',
            'Adonis Julius Archer',
            'Beau Tristan Bentley',
            'Hunter Uriah Mathew Clarke',
            'Leo Gardner',
            'Vaughn Lewis',
            'London Lindsey',
            'Mikayla Lopez',
            'Janet Parsons',
            'Frankie Conner Ritter',
            'Shelby Nathan Yoder',
        ];

        $this->assertSame($expected, $this->sorter->sort($input));
    }

    /**
     * Test sorting handles multiple given names correctly.
     */
    public function test_it_handles_multiple_given_names(): void
    {
        $input = ['John Michael Doe', 'John Adam Doe'];
        $expected = ['John Adam Doe', 'John Michael Doe'];

        $this->assertSame($expected, $this->sorter->sort($input));
    }

    /**
     * Test sorting an empty array returns empty array.
     */
    public function test_it_returns_empty_array_when_given_empty_array(): void
    {
        $this->assertSame([], $this->sorter->sort([]));
    }

    /**
     * Test sorting preserves single entry.
     */
    public function test_it_preserves_single_entry(): void
    {
        $this->assertSame(['Alice Smith'], $this->sorter->sort(['Alice Smith']));
    }
}
