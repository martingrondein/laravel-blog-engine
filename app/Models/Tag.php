<?php

namespace App\Models;

use Mews\Purifier\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtmlInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
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
     * Get the tag of the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->hasManyThrough(
            Post::class,
            PostTag::class,
            'tag_id',
            'id',
            'id',
            'post_id'
        );
    }
}
