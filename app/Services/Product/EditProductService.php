<?php

namespace App\Services\Product;

use Exception;
use Illuminate\Http\Request;

use App\DTO\ProductDTO;

use App\Repositories\Product\EditProductRepository;

class EditProductService {
    public function __construct(
        private EditProductRepository $productRepository
    ) {}

    /**
     * Edit Product
     * @param Request $request
     * @return ProductDTO
     */
    public function editProduct(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:products,id',
                'nama' => 'required',
                'hargaJual' => 'required',
                'quantity' => 'required'
            ]);

            $productDTO = new ProductDTO(
                id: $request->id,
                nama: $request->nama,
                hargaJual: $request->hargaJual,
                quantity: $request->quantity
            );

            $productDTO = $this->productRepository->editProduct($productDTO);

            return $productDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
