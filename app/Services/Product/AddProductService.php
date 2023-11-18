<?php

namespace App\Services\Product;

use Illuminate\Http\Request;

use App\DTO\ProductDTO;
use Exception;

use App\Repositories\Product\AddProductRepository;


class AddProductService {
    public function __construct(
        private AddProductRepository $addProductRepository
    ) {}

    /**
     * Register new Product
     * @param Request $request
     * @return ProductDTO
     */
    public function addProduct(Request $request) {
        try {
            $request->validate([
                'nama' => 'required|unique:products,nama',
                'hargaJual' => 'required',
            ]);

            $productDTO = new ProductDTO(
                id : null,
                nama: $request->nama,
                hargaJual: $request->hargaJual,
                quantity: $request->quantity,
            );

            $productResult = $this->addProductRepository->AddProduct($productDTO);

            return ([
                'nama' => $productResult->getNama(),
                'hargaJual' => $productResult->getHargaJual()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
