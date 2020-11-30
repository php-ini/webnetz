<?php
declare(strict_types=1);

namespace Domains\Webnetz\Category\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package Domains\Webnetz\Category\Repositories
 */
class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Domains\Webnetz\User\Repositories\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function images()
    {
        return $this->belongsToMany('Domains\Webnetz\Image\Repositories\Image', 'category_image', 'category_id');
    }
}
