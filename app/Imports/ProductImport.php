<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name'        => $row['name'],
            'code'        => $row['code'],
            'description' => $row['description'],
            'quantity'    => $row['quantity'],
            'price'       => $row['price'],
        ]);
    }

    /**
     * Specify length of chunks.
     *
     * @return int
     */
    public function chunkSize(): int
    {
        return 10000;
    }
}
