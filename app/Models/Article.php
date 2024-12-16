<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\ArticleFactory factory(...$parameters)
 * @mixin Builder
 */
class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'description',
        'url',
        'author',
        'source',
        'content',
        'category',
        'published_at',
    ];
}
