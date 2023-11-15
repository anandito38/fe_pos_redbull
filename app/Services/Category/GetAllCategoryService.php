<?php

namespace App\Services\Category;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Category\GetAllCategoryRepository;

class GetAllCategoryService {
    public function __construct(
        private GetAllCategoryRepository $categoryRepository
    ) {}

    /**
     * Get all category
     * @return array
     */
    public function getAllCategory(Request $request) {
        try {
            return $this->categoryRepository->getAllCategory($request);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
