<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Categories\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Categories\CategoryDeleteRequest;
use App\Http\Requests\Dashboard\Categories\CategoryUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\services\CategoryService;

class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $mainCategories = $this->categoryService->getMainCategories();
        return view('dashboard.categories.index', compact('mainCategories'));
    }


    public function getall()
    {
        return $this->categoryService->datatable();
    }



    /* Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {  // dd($request->validated());
        $this->categoryService->store($request->validated());
        return redirect()->route('dashboard.categories')->with('success', 'تمت الاضافة بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$category = $this->categoryService->getAll();
         $mainCategories = $this->categoryService->getById($id);
        return view('dashboard.categories.edit', compact('mainCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->categoryService->update($id, $request->validated());
        return redirect()->route('dashboard.categories')->with('success', 'تمت الاضافة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(CategoryDeleteRequest $request)
    {
        $this->categoryService->delete($request->validated());
        return redirect()->route('dashboard.categories');
    }
}
