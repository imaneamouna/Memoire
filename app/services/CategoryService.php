<?php

namespace App\services;

use App\Models\category;
use App\Utils\ImageUpload;
use Yajra\DataTables\Facades\DataTables;
use App\repositories\CategoryRepository;

class CategoryService
{

    private $categoryRepository;

    public function __construct(CategoryRepository $repo)
    {
        $this->categoryRepository = $repo;
    }

    public function getMainCategories()
    {
        return $this->categoryRepository->getMainCategories();
    }



    public function store($params)
    {
        //$params['image'] = $params['parent_id'] ?? 0;
        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }
        return $this->categoryRepository->store($params);
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }


    public function update($id, $params)
    {
        $category = $this->categoryRepository->getById($id);
        $params['parent_id'] = $params['parent_id'] ?? 0;
        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }

        return  $this->categoryRepository->update($category, $params);
    }


    public function delete($params)
    {
        
        $this->categoryRepository->delete($params);
    }

    public function datatable()
    {
        $query = $this->categoryRepository->baseQuery(['product']);
        return  DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $btn = '
                        <a href="' . Route('dashboard.categories.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                        <button type="button" id="deleteBtn"  data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal"
                        data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })

            ->addColumn('parent', function ($row) {
                return $row->name;
                // return ($row->parent ==  0) ? 'قسم رئيسي' :   $row->parents->name;
            })

            ->addColumn('image', function ($row) {
                return '<img src="' . asset($row->image) . '" width="100px" height="100px">';
            })

            ->rawColumns(['parent', 'action', 'image'])
            ->make(true);
    }


    public function getAll()
    {
       // return 1;
        //return $this->categoryRepository->baseQuery(['child'])->get();
        return $this->categoryRepository->getMainCategories();
    }
}
