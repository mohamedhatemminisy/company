<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Image;
use Illuminate\Http\Request;
use View;
use DB;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Image
     */
    private $image;
    /**
     * @var City
     */
    private $city;

    /**
     * @var Area
     */
    private $area;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var string
     */
    private $views_directory;
    public function __construct(Category $category, City $city, Area $area, Company $company, Image $image)
    {
        $this->area = $area;
        $this->image = $image;
        $this->company = $company;
        $this->city = $city;
        $this->category = $category;
        $this->views_directory = 'dashboard.company.';

        $categories = Category::get();
        $cities = City::get();
        $areas = Area::get();
        View::share('areas', $areas);
        View::share('cities', $cities);
        View::share('categories', $categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->company::orderBy('created_at', 'desc')->paginate(PAGINATION_COUNT);
        return view($this->views_directory . '.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->views_directory . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $company = Company::create($data);
            foreach ($request->categories as $category) {
                store_categories($category, $company->id);
            }
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                store_images($images, $company->id);
            }
            DB::commit();
            return $company ? redirect(route('companies.index'))->with(['success' => trans('admin.added_success')]) : redirect()->back();
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('companies.index')->with(['error' => trans('admin.something_wrong')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->company::with('categories')->find($id);
        return view($this->views_directory . '.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company::find($id);
        foreach ($company->categories as $cat) {
            $category_ids[] = $cat->id;
        }
        return view($this->views_directory . '.edit', compact('company', 'category_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $company = $this->company::find($id);
            if (!$company)
                return redirect()->route('companies.index')->with(['error' => trans('admin.not_found')]);
            $company->update($request->all());
            foreach ($request->categories as $category) {
                $old_company_cat = CompanyCategory::where('company_id', $company->id)
                    ->where('category_id', $category)->first();
                if (!$old_company_cat) {
                    store_categories($category, $company->id);
                }
            }
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                store_images($images, $company->id);
            }
            DB::commit();
            return redirect()->route('companies.index')->with(['success' =>  trans('admin.updated_sucess')]);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('companies.index')->with(['error' =>  trans('admin.try_again')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $company = $this->company::orderBy('id', 'DESC')->find($id);
            if (!$company)
                return redirect()->route('companies.index')->with(['error' => trans('admin.not_found')]);
                foreach($company->images as $image){
                    File::delete(public_path('storage'), $image->image);
                }
                $company->delete();

            return redirect()->route('companies.index')->with(['success' =>  trans('admin.detelted_sucess')]);
        } catch (\Exception $ex) {
            return redirect()->route('companies.index')->with(['error' =>  trans('admin.try_again')]);
        }
    }
    /**
     * Remove the specified image from company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image_destroy($id)
    {
        try {
            $image = $this->image::orderBy('id', 'DESC')->find($id);
            if (!$image)
                return redirect()->back()->with(['error' => trans('admin.not_found')]);
            $image->delete();
            File::delete(public_path('storage'), $image->image);
            return redirect()->back()->with(['success' =>  trans('admin.detelted_sucess')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' =>  trans('admin.try_again')]);
        }
    }

    /**
     * Get areas according to city id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function area(Request $request)
    {
        $areas = Area::where('city_id', $request['val'])->get();
        $arr = [];
        foreach ($areas as $area) {
            $arr['id'] = $area->id;
            $arr['name'] = $area->name;
            $data[] = $arr;
        }
        return response()->json($data);
    }
}
