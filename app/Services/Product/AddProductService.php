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
                'nama' => 'required',
                'hargaJual' => 'required',
            ]);

            $productDTO = new ProductDTO(
                id : null,
                nama: $request->nama
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
