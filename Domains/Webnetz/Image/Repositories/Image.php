<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package Domains\Webnetz\Image\Repositories
 */
class Image extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'image';

    /**
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'file_name', 'file_path', 'type', 'keywords', 'height', 'width', 'exif'];

    /**
     * @var array
     */
    protected $appends = ['exif_data'];

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
    public function categories()
    {
        return $this->belongsToMany('Domains\Webnetz\Category\Repositories\Category', 'category_image', 'image_id');
    }

    /**
     * @return mixed
     */
    public function getExifDataAttribute()
    {
        return json_decode($this->exif, true);
    }
}
