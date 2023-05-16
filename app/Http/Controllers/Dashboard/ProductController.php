<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\product\StoreProductRequest;
use App\Http\Requests\Dashboard\product\ProductImagesReaquest;
use App\services\CategoryService;
use App\services\ProductService;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{

    private CategoryService $categoryService;
    public ProductService $productService;


    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        return view('dashboard.products.index');
    }



    public function getall()
    {
        return $this->productService->datatable();
    }

    public function create()
    {
        $categories = $this->categoryService->getMainCategories();

        return view('dashboard.products.create', compact('categories'));
    }




    public function store(StoreProductRequest $request)
    {
        try {
            $this->productService->store($request->validated());
            return redirect()->route('dashboard.products');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('messages.Some thing is happend'));
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // return 1;
        $categories = $this->categoryService->getMainCategories();
        $product = $this->productService->getById($id);
        ///return $product->images;
        return view('dashboard.products.edit', compact('categories', 'product'));
    }


    public function update(StoreProductRequest $request, $id)
    {

        $this->productService->update($id, $request->validated());
        return redirect()->route('dashboard.products');
    }


    public function delete(StoreProductRequest $request)
    {
        $this->productService->delete($request->validated());
        return redirect()->route('dashboard.categories');
    }



    // public function deleteImages(StoreProductRequest $request)
    // {
    //     $this->productService->delete($request->validated());
    //     return redirect()->route('dashboard.products');
    // }
    public function deleteImage($id)
    {
        $this->productService->deleteImage($id);
        return redirect()->back();
    }
}
