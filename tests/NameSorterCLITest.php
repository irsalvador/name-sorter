<?php

use PHPUnit\Framework\TestCase;

/**
 * Class NameSorterCLITest
 *
 * Unit test for the NameSorter CLI script.
 *
 * This test verifies that the CLI script correctly reads a file of names,
 * sorts them using the NameSorter service, and writes the sorted output
 * to a file. It also checks the CLI exit code.
 */
class NameSorterCLITest extends TestCase
{
    /**
     * Test that the CLI script sorts names correctly and writes to the output file.
     *
     * @return void
     */
    public function testCliSortsNames(): void
    {
        $fixturesDir = __DIR__ . DIRECTORY_SEPARATOR . 'fixtures';

        // Ensure fixtures directory exists
        if (!is_dir($fixturesDir)) {
            mkdir($fixturesDir, 0777, true);
        }

        $inputFile = $fixturesDir . DIRECTORY_SEPARATOR . 'unsorted-names.txt';
        $outputFile = $fixturesDir . DIRECTORY_SEPARATOR . 'sorted-names-test.txt';

        // Write sample names to input file
        file_put_contents($inputFile, "Alice Smith\nBob Jones");

        // Run CLI script
        $command = "php " . __DIR__ . DIRECTORY_SEPARATOR . "../bin/name-sorter $inputFile $outputFile";
        exec($command, $output, $returnVar);

        // Assert CLI exits successfully
        $this->assertEquals(0, $returnVar, 'CLI script did not exit successfully.');

        // Assert output file exists
        $this->assertFileExists($outputFile, 'Output file was not created by CLI script.');

        // Assert output file content is sorted correctly
        $sortedNames = file($outputFile, FILE_IGNORE_NEW_LINES);
        $this->assertEquals(['Bob Jones', 'Alice Smith'], $sortedNames, 'Names were not sorted correctly.');

        // Clean up fixtures
        unlink($inputFile);
        unlink($outputFile);
    }
}