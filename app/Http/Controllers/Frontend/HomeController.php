<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var Company
     */
    private $company;
    public function __construct(Company $company)
    {
        $this->company = $company;
        $this->views_directory = 'frontend.company';
    }
    public function index()
    {
        $data = $this->company::orderBy('created_at', 'desc')->paginate(PAGINATION_COUNT);
        return view($this->views_directory . '.index')->with(compact('data'));
    }

    public function company($id){
        $company = $this->company::findOrFail($id);
        return view($this->views_directory . '.details')->with(compact('company'));
    }
}
