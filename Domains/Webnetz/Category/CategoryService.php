<?php
declare(strict_types=1);

namespace Domains\Webnetz\Category;

use Domains\Webnetz\Category\Formatters\CategoryFormatter;
use Domains\Webnetz\Category\Validators\CategoryValidator;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\User\UserService;
use Domains\Webnetz\Category\Repositories\Category;

final class CategoryService extends AbstractService
{
    const CATEGORIES_PER_PAGE = 15;

    protected CategoryValidator $validator;
    protected UserService $userService;
    protected CategoryFormatter $formatter;

    public function __construct()
    {
        $this->validator = new CategoryValidator();
        $this->userService = new UserService();
        $this->formatter = new CategoryFormatter();
    }

    public function getCategoriesWithPagination()
    {
        return Category::Where('user_id', $this->userService->getCurrentUser()->id)
            ->paginate(self::CATEGORIES_PER_PAGE);
    }

    public function getCategoriesArray(): array
    {
        return Category::Where('user_id', $this->userService->getCurrentUser()->id)
            ->get()->pluck('name', 'id')->toArray();
    }

    public function createCategory(array $input): Category
    {
        return Category::create($this->formatInput($input));
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
        return Category::destroy($id);
    }


}
