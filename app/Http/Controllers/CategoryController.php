<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Services\Category\GetAllCategoryService;
use App\Services\Category\AddCategoryService;
use App\Services\Category\DeleteCategoryService;
use App\Services\Category\EditCategoryService;

class CategoryController extends Controller
{
    public function __construct(
        private GetAllCategoryService $getAllCategoryService,
        private AddCategoryService $addCategoryService,
        private DeleteCategoryService $deleteCategoryService,
        private EditCategoryService $editCategoryService
    ) {}

    public function getAllCategory(Request $request) {
        try {
            $resultData = $this->getAllCategoryService->getAllCategory($request);

            return view('stock.category')->with('categoryInfo', $resultData);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage()
            ])->setStatusCode(404);
        }
    }

    public function addCategory(Request $request){
        try {
            $resultData = $this->addCategoryService->AddCategory($request);

            toastr()->success('Category added successfully!', 'Category', ['timeOut' => 3000]);
            return redirect('/category')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Category', ['timeOut' => 3000]);
            return redirect('/category')->with('status', $error->getMessage());
        }
    }

    public function deleteCategory(Request $request){
        try {
            $resultData = $this->deleteCategoryService->deleteCategory($request);

            toastr()->warning('Category deleted successfully!', 'Category', ['timeOut' => 3000]);
            return redirect('/category')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Category', ['timeOut' => 3000]);
            return redirect('/category')->with('status', $error->getMessage());
        }
    }

    public function editCategory(Request $request){
        try {
            $resultData = $this->editCategoryService->editCategory($request);

            toastr()->info('Category updated successfully!', 'Category', ['timeOut' => 3000]);
            return redirect('/category')->with('status', 'success');
        } catch (Exception $error) {
            toastr()->error($error->getMessage(), 'Category', ['timeOut' => 3000]);
            return redirect('/category')->with('status', $error->getMessage());
        }
    }
}
