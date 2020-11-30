<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image;

use Illuminate\Support\Facades\File;
use Domains\Webnetz\User\UserService;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\Category\CategoryService;
use Domains\Webnetz\Image\Repositories\Image;
use Domains\Webnetz\Image\Validators\ImageValidator;
use Domains\Webnetz\Image\Formatters\ImageFormatter;

/**
 * Class ImageService
 * @package Domains\Webnetz\Image
 */
final class ImageService extends AbstractService
{
    const CATEGORIES_PER_PAGE = 15;

    const IMAGES_PUBLIC_PATH = 'uploaded';

    /**
     * @var ImageValidator
     */
    protected ImageValidator $validator;
    /**
     * @var UserService
     */
    protected UserService $userService;
    /**
     * @var CategoryService
     */
    protected CategoryService $categoryService;
    /**
     * @var ImageFormatter
     */
    protected ImageFormatter $formatter;

    /**
     * ImageService constructor.
     */
    public function __construct()
    {
        $this->validator = new ImageValidator();
        $this->userService = new UserService();
        $this->categoryService = new CategoryService();
        $this->formatter = new ImageFormatter();
    }

    /**
     * @return mixed
     */
    public function getImagesWithPagination()
    {
        return Image::Where('user_id', $this->userService->getCurrentUser()->id)
            ->paginate(self::CATEGORIES_PER_PAGE);
    }

    /**
     * @param $image
     * @return mixed
     */
    public function uploadImage($image)
    {
        $imageName = time() . '-' . $image->getClientOriginalName();

        return $image->move(public_path(self::IMAGES_PUBLIC_PATH), $imageName);
    }

    /**
     * @param Image $model
     * @param $image
     * @return mixed
     */
    public function uploadImageAndDeleteOld(Image $model, $image)
    {
        if (File::exists(public_path($model->file_path))) {
            File::delete(public_path($model->file_path));
        }

        $imageName = time() . '-' . $image->getClientOriginalName();

        return $image->move(public_path(self::IMAGES_PUBLIC_PATH), $imageName);
    }

    /**
     * @param array $input
     * @param string $imageName
     * @param string $mime
     * @return Image
     */
    public function createImage(array $input, string $imageName, string $mime): Image
    {
        $input = array_merge($input, ['uploaded_image' => $imageName, 'mime' => $mime]);

        return Image::create($this->formatInput($input));
    }

    /**
     * @param Image $model
     * @param array $input
     * @param string $imageName
     * @param string $mime
     * @return bool
     */
    public function replaceImage(Image $model, array $input, string $imageName, string $mime): bool
    {
        $input = array_merge($input, ['uploaded_image' => $imageName, 'mime' => $mime]);

        return $model->update($this->formatInput($input));
    }

    /**
     * @param Image $image
     * @param array $input
     */
    public function createCategoryImages(Image $image, array $input)
    {
        $filtered = $this->formatter->prepareCategoriesForImage($image, $input);

        return $image->categories()->attach($filtered);
    }

    /**
     * @param Image $image
     * @param array $input
     */
    public function updateCategoryImages(Image $image, array $input)
    {
        $filtered = $this->formatter->prepareCategoriesForImage($image, $input);

        $image->categories()->detach();

        return $image->categories()->attach($filtered);
    }

    /**
     * @param array $data
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function isValidWithoutImage(array $data): bool
    {
        return $this->validator->isValidWithoutImage($data);
    }

    /**
     * @param Image $image
     * @param array $input
     * @return bool
     */
    public function saveImage(Image $image, array $input)
    {
        return $image->update($this->formatInput($input));
    }

    /**
     * @param int $id
     * @return Image
     */
    public function getImageById(int $id): Image
    {
        return Image::findOrFail($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteImage(int $id)
    {
        return Image::destroy($id);
    }

    /**
     * @param array $input
     * @return array
     */
    public function createNewCategoryIfExists(array $input): array
    {
        if (!empty($input['new_category'])) {
            $categoryService = new CategoryService();
            $newCategory = $categoryService->createCategory(['name' => $input['new_category']]);
            $input['categories'][] = $newCategory->id;
        }

        return $input;
    }

    /**
     * @return mixed
     */
    public function getUserImages()
    {
        return Image::where('user_id', $this->userService->getCurrentUser()->id)->get();
    }
}
