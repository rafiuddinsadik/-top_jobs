<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Marketing',
            'Information Technology',
            'Web Design',
            'Graphics',
            'App Development',
            'Construction',
            'Accountant',
            'Finance',
            'Medical',
            'Management'
        ];

        foreach ($categories as $category){
            Category::create([
                'user_id' => 2,
                'slug' => str_slug($category),
                'name' => $category,
            ]);
        }
    }
}
