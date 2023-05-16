<?php

namespace App\repositories;

use App\Models\category;
use App\Models\product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use App\Utils\ImageUpload;


class ProductRepository implements RepositoryInterface
{

    public $product;


    public  function __construct(product $product)
    {
        $this->product = $product;
    }

    public function getMainCategories()
    {
        return $this->product::where('parent_id', 0)->get();
    }

    public function baseQuery($relations = [], $withCount = [], $where = [])
    {
        $query = $this->product->select('*')->with($relations);
        // foreach ($withCount as $key => $value) {
        //    $query->withCount($value);
        // }
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }
        return $query;
    }


    public function store($params)
    {
        //DB::beginTransaction();
        $product = $this->product->create($params);
        $product->images()->createMany($this->uploadMultipleImages($params, $product));
        return $product;
    }



    private function uploadMultipleImages($params, $product)
    {
        $images = [];
        if (isset($params['images'])) {
            $i = 0;
            foreach ($params['images'] as $key => $value) {
                $images[$i]['image'] = ImageUpload::uploadImage($value);
                $images[$i]['product_id '] = $product->id;
                $i++;
            }
        }

        return $images;
    }

    public function getById($id)
    {
        $query = $this->product::where('id', $id);
        return $query->firstOrFail();
    }
    public function getImageById($id)
    {
        $query = ProductImage::where('id', $id);
        return $query->firstOrFail();
    }

    public function update($id, $params)
    {
        $product = $this->getbyId($id);
        $product->update($params);
        $product->images()->createMany($this->uploadMultipleImages($params, $product));
        //  dd($product);
        return  $product;
    }
    public function delete($params)
    {
        $product = $this->getbyId($params['id']);
        return $product->delete();
    }


    public function deleteImages($params)
    {
        $image = $this->getbyId($params['id']);
        dd($image);
        return  $image->images()->delete();
    }
    public function deleteImage($params)
    {
        $image = $this->getImageById($params);
        if ($image)
            return $image->delete();
        else
            return false;
    }
}
