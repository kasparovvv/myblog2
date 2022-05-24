<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryModel;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryModel::create(['category_name'=>'Tech']);
        CategoryModel::create(['category_name'=>'Development']);
        CategoryModel::create(['category_name'=>'Cook']);
        CategoryModel::create(['category_name'=>'Travel']);
        CategoryModel::create(['category_name'=>'Home']);
        CategoryModel::create(['category_name'=>'Art']);
        CategoryModel::create(['category_name'=>'Music']);
        CategoryModel::create(['category_name'=>'Health']);
        CategoryModel::create(['category_name'=>'Body']);
        CategoryModel::create(['category_name'=>'Movies']);
        CategoryModel::create(['category_name'=>'Design']);
        CategoryModel::create(['category_name'=>'Sports']);
        CategoryModel::create(['category_name'=>'Humor']);

    }
}
