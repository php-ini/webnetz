<?php

namespace Domains\Webnetz\Category\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    protected $fillable = ['name', 'description', 'user_id'];


    public function user(){
        return $this->belongsTo('Domains\Webnetz\User\Repositories\User', 'user_id');
    }

    public function images()
    {
        return $this->belongsToMany('Domains\Webnetz\Image\Repositories\Image', 'category_image', 'category_id');
    }
}
