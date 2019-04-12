<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$list = 'Travel,Meals and Entertainment,Computer - Hardware,Computer - Software,Office Supplies';
    	foreach (explode(',', $list) as $key => $value) {
    		$category = new Category();
			$category->name	= $value;
	        $category->save();
    	}
    }
}
