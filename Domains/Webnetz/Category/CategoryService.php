<?php
declare(strict_types=1);

namespace Domains\Webnetz\Category;

use Domains\Webnetz\Category\Formatters\CategoryFormatter;
use Domains\Webnetz\Category\Validators\CategoryValidator;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\User\UserService;
use Domains\Webnetz\Category\Repositories\Category;

/**
 * Class CategoryService
 * @package Domains\Webnetz\Category
 */
final class CategoryService extends AbstractService
{
    const CATEGORIES_PER_PAGE = 15;

    /**
     * @var CategoryValidator
     */
    protected CategoryValidator $validator;
    /**
     * @var UserService
     */
    protected UserService $userService;
    /**
     * @var CategoryFormatter
     */
    protected CategoryFormatter $formatter;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        $this->validator = new CategoryValidator();
        $this->userService = new UserService();
        $this->formatter = new CategoryFormatter();
    }

    /**
     * @return mixed
     */
    public function getCategoriesWithPagination()
    {
        return Category::Where('user_id', $this->userService->getCurrentUser()->id)
            ->paginate(self::CATEGORIES_PER_PAGE);
    }

    /**
     * @return array
     */
    public function getCategoriesArray(): array
    {
        return Category::Where('user_id', $this->userService->getCurrentUser()->id)
            ->get()->pluck('name', 'id')->toArray();
    }

    /**
     * @param array $input
     * @return Category
     */
    public function createCategory(array $input): Category
    {
        return Category::create($this->formatInput($input));
    }

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function saveCategory(int $id, array $input)
    {
        $category = Category::find($id);

        return $category->update([
            'name' => $input['name'],
            'description' => $input['description'],
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getCategoryById(int $id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function deleteCategory(int $id)
    {
        return Category::destroy($id);
    }


}
