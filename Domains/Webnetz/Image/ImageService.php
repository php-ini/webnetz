<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image;

use Domains\Webnetz\User\UserService;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\Category\CategoryService;
use Domains\Webnetz\Image\Repositories\Image;
use Domains\Webnetz\Image\Validators\ImageValidator;
use Domains\Webnetz\Image\Formatters\ImageFormatter;
use Illuminate\Support\Facades\File;

final class ImageService extends AbstractService
{
    const CATEGORIES_PER_PAGE = 15;

    const IMAGES_PUBLIC_PATH = 'uploaded';

    protected ImageValidator $validator;
    protected UserService $userService;
    protected CategoryService $categoryService;
    protected ImageFormatter $formatter;

    public function __construct()
    {
        $this->validator = new ImageValidator();
        $this->userService = new UserService();
        $this->categoryService = new CategoryService();
        $this->formatter = new ImageFormatter();
    }

    public function getImagesWithPagination()
    {
        return Image::Where('user_id', $this->userService->getCurrentUser()->id)
            ->paginate(self::CATEGORIES_PER_PAGE);
    }

    public function uploadImage($image)
    {
        $imageName = time() . '-' . $image->getClientOriginalName();

        return $image->move(public_path(self::IMAGES_PUBLIC_PATH), $imageName);
    }

    public function uploadImageAndDeleteOld(Image $model, $image)
    {
        if (File::exists(public_path($model->file_path))) {
            File::delete(public_path($model->file_path));
        }

        $imageName = time() . '-' . $image->getClientOriginalName();

        return $image->move(public_path(self::IMAGES_PUBLIC_PATH), $imageName);
    }

    public function createImage(array $input, string $imageName, string $mime): Image
    {
        $input = array_merge($input, ['uploaded_image' => $imageName, 'mime' => $mime]);

        return Image::create($this->formatInput($input));
    }

    public function replaceImage(Image $model, array $input, string $imageName, string $mime): bool
    {
        $input = array_merge($input, ['uploaded_image' => $imageName, 'mime' => $mime]);

        return $model->update($this->formatInput($input));
    }

    public function createCategoryImages(Image $image, array $input)
    {
        $filtered = $this->formatter->prepareCategoriesForImage($image, $input);

        return $image->categories()->attach($filtered);
    }

    public function updateCategoryImages(Image $image, array $input)
    {
        $filtered = $this->formatter->prepareCategoriesForImage($image, $input);

        $image->categories()->detach();

        return $image->categories()->attach($filtered);
    }

    public function isValidWithoutImage(array $data): bool
    {
        return $this->validator->isValidWithoutImage($data);
    }

    public function saveImage(Image $image, array $input)
    {
        return $image->update($this->formatInput($input));
    }

    public function getImageById(int $id): Image
    {
        return Image::findOrFail($id);
    }

    public function deleteImage(int $id)
    {
        return Image::destroy($id);
    }

    public function createNewCategoryIfExists(array $input): array
    {
        if(!empty($input['new_category'])){
            $categoryService = new CategoryService();
            $newCategory = $categoryService->createCategory(['name' => $input['new_category']]);
            $input['categories'][] = $newCategory->id;
        }

        return $input;
    }

    public function getUserImages()
    {
        return Image::where('user_id', $this->userService->getCurrentUser()->id)->get();
    }
}
