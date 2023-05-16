<?php

namespace App\services;

use App\repositories\CategoryRepository;
use App\repositories\ProductRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Utils\ImageUpload;

class ProductService
{

    public $productRepository;
    public function __construct(ProductRepository $repo)
    {
        $this->productRepository = $repo;
    }

    public function getAll()
    {
        return $this->productRepository->baseQuery();
    }

    public function getById($id)
    {
        //return $this->productRepository->getById($id);
        return $this->productRepository->baseQuery([], [], ['id' => $id])->firstOrFail();
    }
    public function store($params)
    {

        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image'], 100, 100);
        }
        //implode is a famous function his function convert array to string & ',' it means do this , symbol between the items
        if (isset($params['colors'])) {
            $params['color'] = implode(',', $params['colors']);
            unset($params['colors']); //unset convert colors input name to color like the coulm in db
        }
        if (isset($params['sizes'])) {
            $params['size'] = implode(',', $params['sizes']);
            unset($params['sizes']);
        }
        //dd($params);
        return  $this->productRepository->store($params);
    }
    public function update($id, $params)
    {

        //$product = $this->productRepository->getById($id);
        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }
        if (isset($params['colors'])) {
            $params['color'] = implode(',', $params['colors']);
            unset($params['colors']);
        }
        if (isset($params['sizes'])) {
            $params['size'] = implode(',', $params['sizes']);
            unset($params['sizes']);
        }


        return $this->productRepository->update($id, $params);
    }

    public function delete($params)
    {
        $this->productRepository->delete($params);
    }

    public function deleteImages($params)
    {
        return $this->productRepository->deleteImages($params);
    }
    //for delete only one image 
    public function deleteImage($params)
    {
        return $this->productRepository->deleteImage($params);
    }


    public function datatable()
    {
        $query = $this->productRepository->baseQuery(['category']);
        // $query = $this->productRepository->baseQuery();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . Route('dashboard.products.edit', $row->id) . '" class="edit btn btn-success btn-sm" data-id="' . $row->id . '"><i class="fa fa-edit" style{color:black;font-size:30px;}></i></a>
                        <a href="" class="btn btn-danger btn-sm delete-product" data-id="' . $row->id . '">Delete</a>';
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })



            ->addColumn('category', function ($row) {
                return $row->category->name;
            })


            ->addColumn('main_price', function ($row) {
                return $row->main_price;
            })


            ->addColumn('main_discount', function ($row) {
                return $row->main_discount;
            })


            ->addColumn('color', function ($row) {
                return $row->color;
            })


            ->rawColumns(['action'])
            ->make(true);
    }
}
