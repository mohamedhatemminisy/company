<?php

use App\Models\CompanyCategory;
use App\Models\Image;

define('PAGINATION_COUNT', 10);

if (!function_exists('upload_image')) {
    function upload_image($file, $prefix)
    {
        if ($file) {
            $files = $file;
            $imageName = $prefix . rand(3, 999) . '-' . time() . '.' . $files->extension();
            $image = "storage/" . $imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}

if (!function_exists('store_images')) {
    function store_images($images ,$company_id)
    {
        foreach ($images as $image) {
            $new_image = upload_image($image, 'image_');
            $property_image = new Image();
            $property_image->company_id = $company_id;
            $property_image->image = $new_image;
            $property_image->save();
        }
    }
}
if (!function_exists('store_categories')) {
    function store_categories($category ,$company_id)
    {
        $company_category = new CompanyCategory();
        $company_category->company_id = $company_id;
        $company_category->category_id = $category;
        $company_category->save();
    }
}


