<?php

namespace App\Repositories\Category;

use Exception;

use App\DTO\CategoryDTO;
use App\Models\Category;

class EditCategoryRepository {
    /**
     * Edit Category
     * @param CategoryDTO $CategoryDTO
     * @return CategoryDTO
     */
    public function editCategory(CategoryDTO $categoryDTO) {
        try {
            $category = Category::find($categoryDTO->id);
            $category->namaCategory = $categoryDTO->namaCategory;
            $category->save();

            return $category;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
