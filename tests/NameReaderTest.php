<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\NameReader;

/**
 * Class NameReaderTest
 *
 * Unit tests for the NameReader service.
 * Verifies reading names from a file and handling edge cases.
 */
final class NameReaderTest extends TestCase
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
     * Test reading names from a file.
     */
    public function test_reads_names_from_file(): void
    {
        file_put_contents($this->tempFile, "Alice Smith\nBob Jones\n");

        $reader = new NameReader();
        $names = $reader->read($this->tempFile);

        $this->assertSame(['Alice Smith', 'Bob Jones'], $names);
    }

    /**
     * Test that empty lines are skipped.
     */
    public function test_skips_empty_lines(): void
    {
        file_put_contents($this->tempFile, "Alice Smith\n\nBob Jones\n");

        $reader = new NameReader();
        $names = $reader->read($this->tempFile);

        $this->assertSame(['Alice Smith', 'Bob Jones'], $names);
    }

    /**
     * Test exception is thrown if file is not readable.
     */
    public function test_throws_exception_if_file_not_readable(): void
    {
        $this->expectException(\RuntimeException::class);

        $reader = new NameReader();
        $reader->read('/path/to/nonexistent/file.txt');
    }
}
