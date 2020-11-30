<?php


namespace Domains\Webnetz\Image\Formatters;


use Domains\Webnetz\Image\ImageService;
use Domains\Webnetz\User\UserService;
use Illuminate\Support\Facades\Auth;
use Image;

class ImageFormatter implements FormatterInterface
{
    /**
     * @inheritDoc
     */
    public function format(array $data): array
    {
        $data = $this->getImageData($data);

        return $data;
    }

    private function getImageData(array $data): array
    {
        if(empty($data['uploaded_image'])) {
            return [
                'name' => $data['name'],
                'keywords' => $data['keywords'],
                'categories' => $data['categories'],
            ];
        }

        $userService = new UserService();
        $image = Image::make($data['uploaded_image']);
        $fileName = basename($data['uploaded_image']);
        $filePath = ImageService::IMAGES_PUBLIC_PATH . '/' . $fileName;

        return [
            'name' => $data['name'],
            'user_id' => $userService->getCurrentUser()->id,
            'file_name' => $fileName,
            'file_path' => $filePath,
            'type' => $data['mime'],
            'keywords' => $data['keywords'],
            'categories' => $data['categories'],
            'height' => $image->height(),
            'width' => $image->width(),
            'exif' => json_encode($this->getExifData($filePath)),
        ];
    }

    private function getExifData($filePath)
    {
        return @exif_read_data(public_path($filePath));
    }

    public function prepareCategoriesForImage($image, array $data): array
    {
        $i = 0;
        foreach($data['categories'] as $category){
            $all[$i]['category_id'] = $category;
            $all[$i]['image_id'] = $image->id;
            $all[$i]['user_id'] = Auth::user()->id;
            $i++;
        }
        return $all;
    }
}
