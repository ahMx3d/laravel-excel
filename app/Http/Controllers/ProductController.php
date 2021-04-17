<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Exports\ProductExport;
use App\Http\Requests\UploadProductsRequest;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Export products into excel sheet.
     *
     * @param \App\Http\Requests\UploadProductsRequest $request
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function upload(UploadProductsRequest $request)
    {
        $file = $request->validated()['file'];

        Excel::queueImport(new ProductImport(), $file);

        return redirect(route('products.import'))->with([
            'message' => 'Imported Successfully!',
            'type'    => 'success',
        ]);
    }

    /**
     * Export products into excel sheet.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        return view('products.import');
    }

    /**
     * Export products into excel sheet.
     *
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function export()
    {
        return Excel::download(new ProductExport, 'products-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(Product::paginator);

        return view('products.index', \compact('products'));
    }
}
