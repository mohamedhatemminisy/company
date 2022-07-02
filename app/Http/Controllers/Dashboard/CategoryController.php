<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var string
     */
    /**
     * @var string
     */
    private $views_directory;
    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->views_directory = 'dashboard.category.';
    }

    public function create()
    {
        return view($this->views_directory . '.create');
    }

    public function store(CategoryRequest $request){
        $data = $request->all();
        $this->category::create($data);
        return redirect()->route('category.create')->with(['success' => 'Category created successfully']);
    }
}
