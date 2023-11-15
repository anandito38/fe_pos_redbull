<?php

namespace App\Repositories\Category;

use Exception;

use App\Models\Category;
use App\DTO\CategoryDTO;

class GetAllCategoryRepository
{
    public function getAllCategory()
    {
        try{
            $categories = Category::all();

            $categoryDTOs = [];
            foreach ($categories as $category) {
                $categoryDTO = new categoryDTO(
                    id: $category->id,
                    namaCategory: $category->namaCategory
                );

                array_push($categoryDTOs, $categoryDTO);
            }

            return $categoryDTOs;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
