<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\DTO\CategoryDTO;

use App\Repositories\Category\DeleteCategoryRepository;

class DeleteCategoryService {
    public function __construct(
        private DeleteCategoryRepository $categoryRepository
    ) {}

    /**
     * Delete Category
     * @param Request $request
     * @return CategoryDTO
     */
    public function deleteCategory(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:categories,id',
            ]);

            $categoryDTO = new CategoryDTO(
                id : $request->id
            );

            $categoryDTO = $this->categoryRepository->deleteCategory($categoryDTO);

            return $categoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
