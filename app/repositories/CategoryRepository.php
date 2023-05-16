<?php

namespace App\repositories;

use App\Models\Category;
use App\Models\product;

class CategoryRepository implements RepositoryInterface
{

    public $category;

    public  function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getMainCategories()
    {
        return $this->category->select('*')->get();
    }

    public function baseQuery($relations = [])
    {
        $query = $this->category->select('*')->with($relations);
        return $query;
    }


    public function store($params)
    {
        return $this->category->create($params);
    }


    public function getById($id)
    {
        $query = $this->category::where('id', $id);
        // if ($childrenCount) { //if not null
        //     $query->withCount('child');
        // }
        return $query->firstOrFail();
    }

    public function update($category, $params)
    {
        return $category->update($params);
    }
    public function delete($params)
    {
        $category = $this->getbyId($params['id']);
        $proudrct = product::where('category_id',$params['id']);
        $proudrct->delete();
        return $category->delete();
    }
}
