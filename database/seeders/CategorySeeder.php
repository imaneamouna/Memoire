<?php

namespace Database\Seeders;
use App\Http\Models\category;
use App\Models\category as ModelsCategory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsCategory::factory(10)->create();//10 fake data
        //CategoryFactory::count(20)->create();
    }
}
