<?php

namespace App\Repositories\Category;

use Exception;
use App\DTO\CategoryDTO;

use App\Models\Category;

class AddCategoryRepository {
    /**
     * Register new category
     * @param CategoryDTO $CategoryDTO
     * @return CategoryDTO
     */
    public function AddCategory(CategoryDTO $categoryDTO) {
        try {
            $category = new Category();
            $category->namaCategory = $categoryDTO->namaCategory;
            $category->save();

            return $categoryDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
