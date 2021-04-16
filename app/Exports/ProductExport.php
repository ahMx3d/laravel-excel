<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // take 100 just for testing as 100000 takes a while
        return Product::take(100)->latest('id')->get();
    }

    /**
     * @var \App\Models\Product $product
     */
    public function map($product): array
    {
        return [
            $product->name,
            $product->description,
            $product->code,
            $product->quantity,
            $product->price,
            $product->created_at->toDateString(),
        ];
    }

    /**
     * Add heading row as very first row of the sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Description',
            'Code',
            'Quantity',
            'Price',
            'Created At',
        ];
    }
}
