<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\NameWriter;

/**
 * Class NameWriterTest
 *
 * Unit tests for the NameWriter service.
 * Verifies writing names to a file and printing to stdout.
 */
final class NameWriterTest extends TestCase
{
    private string $tempFile;

    /**
     * Create temporary file before each test.
     */
    protected function setUp(): void
    {
        $this->tempFile = tempnam(sys_get_temp_dir(), 'names');
    }

    /**
     * Remove temporary file after each test.
     */
    protected function tearDown(): void
    {
        if (file_exists($this->tempFile)) {
            unlink($this->tempFile);
        }
    }

    /**
     * Test writing names to a file.
     */
    public function test_writes_names_to_file(): void
    {
        $names = ['Alice Smith', 'Bob Jones'];

        $writer = new NameWriter();
        $writer->write($names, $this->tempFile);

        $contents = file($this->tempFile, FILE_IGNORE_NEW_LINES);
        $this->assertSame($names, $contents);
    }

    /**
     * Test printing names to stdout.
     */
    public function test_prints_names_to_stdout(): void
    {
        $names = ['Alice Smith', 'Bob Jones'];

        $writer = new NameWriter();

        ob_start();
        $writer->write($names, $this->tempFile);
        $output = ob_get_clean();

        $expectedOutput = "Alice Smith\nBob Jones\n";

        // Normalize line endings for cross-platform compatibility
        $output = str_replace(["\r\n", "\r"], "\n", $output);
        $expectedOutput = str_replace(["\r\n", "\r"], "\n", $expectedOutput);

        $this->assertSame($expectedOutput, $output);
    }
}
