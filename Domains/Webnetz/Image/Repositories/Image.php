<?php

namespace Domains\Webnetz\Image\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'image';

    protected $fillable = ['name', 'user_id', 'file_name', 'file_path', 'type', 'keywords', 'height', 'width', 'exif'];

    protected $appends = ['exif_data'];

    public function user(){
        return $this->belongsTo('Domains\Webnetz\User\Repositories\User', 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany('Domains\Webnetz\Category\Repositories\Category', 'category_image', 'image_id');
    }

    public function getExifDataAttribute()
    {
        return json_decode($this->exif, true);
    }
}
