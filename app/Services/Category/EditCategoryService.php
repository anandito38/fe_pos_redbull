<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\EditCategoryRepository;

class EditCategoryService {
    public function __construct(
        private EditCategoryRepository $categoryRepository
    ) {}

    /**
     * Edit Category
     * @param Request $request
     * @return CategoryDTO
     */
    public function editCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:categories,id',
                'namaCategory' => 'required'
            ]);

            $categoryDTO = new CategoryDTO(
                id: $request->id,
                namaCategory: $request->namaCategory
            );

            $categoryDTO = $this->categoryRepository->editCategory($categoryDTO);

            return $categoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
