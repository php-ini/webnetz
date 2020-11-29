<?php
declare(strict_types=1);

namespace Domains\Webnetz\Category;

use Domains\Webnetz\Category\Validators\CategoryValidator;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\User\UserService;
use Domains\Webnetz\Category\Repositories\Category;

final class CategoryService extends AbstractService
{
    const CATEGORIES_PER_PAGE = 1;

    protected $validator;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->validator = new CategoryValidator();
        $this->userService = new UserService();
    }

    public function getCategoriesWithPagination()
    {
        return Category::Where('user_id', $this->userService->getCurrentUser()->id)
            ->paginate(self::CATEGORIES_PER_PAGE);
    }

    public function createCategory(array $input): Category
    {
        return Category::create([
            'name' => $input['name'],
            'description' => $input['description'],
            'user_id' => $this->userService->getCurrentUser()->id
        ]);
    }

    public function saveCategory(int $id, array $input)
    {
        $category = Category::find($id);

        return $category->update([
            'name' => $input['name'],
            'description' => $input['description'],
        ]);
    }

    public function getCategoryById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function deleteCategory(int $id)
    {
        return true;
        return Category::destroy($id);
    }


}
