<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $exist = Product::find($row['id']);
        return $exist ? $this->updateProduct($exist, $row) : $this->createProduct($row);
    }

    public function createProduct($row)
    {
        return new Product([
            'id' => $row['id'],
            'name' => $row['name'],
            'picture'=> $row['picture'],
            'description'=> $row['description'],
            'price'=> $row['price'],
            'created_at'=> $row['created_at'],
            'updated_at'=> $row['updated_at'],
            'stock'=> $row['stock'],
            'status'=> $row['status'],
        ]);
    }

    public function updateProduct(Product $product, $row)
    {
        $product->update($row);
        return $product;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:80',
            'picture' => 'required',
            'price' => 'required|numeric|min:0',
        ];
    }
}
