<?php

namespace App\Http\Controllers;

use Domains\Webnetz\Category\CategoryService;
use Illuminate\Http\Request;
use Domains\Webnetz\Image\ImageService;

class Image extends Controller
{
    private $service;

    public function __construct()
    {
        view()->share('header', 'Images Listing');
        view()->share('slot', '');
        $this->service = new ImageService();
	$this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image.index', ['images' => $this->service->getImagesWithPagination()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryService = new CategoryService();

        return view('image.create', ['categories' => $categoryService->getCategoriesArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($this->service->isValid($input)) {

            $input = $this->service->createNewCategoryIfExists($input);
            $mime = $request->image->getMimeType();
            if($imgName = $this->service->uploadImage($request->image)) {
                $image = $this->service->createImage($input, $imgName, $mime);
                $this->service->createCategoryImages($image, $input);
                $request->session()->flash('message', 'Image created successfully !');

                return redirect('image');
            }
        }

        return $this->service->getValidationErrors();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = $this->service->getImageById($id);

        return view('image.show', [
                'image' => $image->toArray(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $image = $this->service->getImageById($id);
        $categories = $image->categories;
        $categoryService = new CategoryService();

        return view('image.edit', [
            'categories' => $categoryService->getCategoriesArray(),
            'image' => $image,
            'selectedCategories' => $categories
            ]
        );
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
        $input = $request->all();
        $image = $this->service->getImageById($id);

        if(!empty($input['image'])) {

            if ($this->service->isValid($input)) {
                $input = $this->service->createNewCategoryIfExists($input);
                $mime = $request->image->getMimeType();
                if($imgName = $this->service->uploadImageAndDeleteOld($image, $request->image)) {
                    $this->service->replaceImage($image, $input, $imgName, $mime);
                    $this->service->updateCategoryImages($image, $input);
                    $request->session()->flash('message', 'Image updated successfully !');

                    return redirect('image');
                }
            }
        } else {

            if ($this->service->isValidWithoutImage($input)) {
                $input = $this->service->createNewCategoryIfExists($input);
                $this->service->saveImage($image, $input);
                $this->service->updateCategoryImages($image, $input);
                $request->session()->flash('message', 'Image updated successfully !');

                return redirect('image');
            }
        }



        return $this->service->getValidationErrors();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        if ($id) {
            $this->service->deleteImage($id);

            $request->session()->flash('message', 'Image deleted successfully !');

            return redirect('image');
        }

        return redirect()->back();
    }
}
