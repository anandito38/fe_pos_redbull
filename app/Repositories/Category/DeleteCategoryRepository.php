<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class DeleteCategoryRepository {
    /**
     * Delete Category
     * @param CategoryDTO $CategoryDTO
     * @return CategoryDTO
     */
    public function deleteCategory(CategoryDTO $categoryDTO) {
        try {
            $category = Category::findOrFail($categoryDTO->id);
            $category->delete();

            return $category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
