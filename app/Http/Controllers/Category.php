<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domains\Webnetz\Category\CategoryService;

class Category extends Controller
{
    public function __construct()
    {
        view()->share('header', 'Categories Listing');
        view()->share('slot', '');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryService = new CategoryService();

        return view('category.index', ['categories' => $categoryService->getCategoriesWithPagination()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new CategoryService();
        $input = $request->all();

        if ($service->isValid($input)) {
            $service->createCategory($input);
            $request->session()->flash('message', 'Category created successfully !');

            return redirect('category');
        }

        return $service->getValidationErrors();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, int $id)
    {
        $service = new CategoryService();
        $category = $service->getCategoryById($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = new CategoryService();
        $input = $request->all();

        if ($service->isValid($input)) {
            $service->saveCategory($id, $input);
            $request->session()->flash('message', 'Category updated successfully !');

            return redirect('category');
        }

        return $service->getValidationErrors();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        $service = new CategoryService();

        if ($id) {
            $service->deleteCategory($id);

            $request->session()->flash('message', 'Category deleted successfully !');

            return redirect('category');
        }

        return redirect()->back();
    }
}
