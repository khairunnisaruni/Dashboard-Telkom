<?php

namespace App\Helpers;

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class ReadFilter implements IReadFilter
{
    private $columns;
    private $headerRow;

    public function __construct(array $columns, int $headerRow = 1)
    {
        $this->columns = $columns;
        $this->headerRow = $headerRow;
    }

    public function readCell(string $column, int $row, ?string $worksheetName = null): bool
    {
        // Always read header row so we can find indexes
        if ($row === $this->headerRow) {
            return true;
        }

        // Only read cells in needed columns
        if (in_array($column, $this->columns, true)) {
            return true;
        }

        return false;
    }
}
