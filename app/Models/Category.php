<?php

namespace App\Models;

use Mews\Purifier\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtmlInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => CleanHtmlInput::class,
        'description'  => CleanHtml::class
    ];

    /**
     * Get the category of the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->hasManyThrough(
            Post::class,
            PostCategory::class,
            'category_id',
            'id',
            'id',
            'post_id'
        );
    }

}
