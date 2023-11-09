<?php

namespace App\Services\Category;

use Illuminate\Http\Request;

use App\DTO\CategoryDTO;
use Exception;

use App\Repositories\Category\AddCategoryRepository;


class AddCategoryService {
    public function __construct(
        private AddCategoryRepository $addCategoryRepository
    ) {}

    /**
     * Register new Category
     * @param Request $request
     * @return CategoryDTO
     */
    public function addCategory(Request $request) {
        try {
            $request->validate([
                'namaCategory' => 'required'
            ]);

            $categoryDTO = new CategoryDTO(
                id : null,
                namaCategory: $request->namaCategory
            );

            $userResult = $this->addCategoryRepository->AddCategory($categoryDTO);

            return ([
                'namaCategory' => $userResult->getNamaCategory()
            ]);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
