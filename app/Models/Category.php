<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;

class Category extends Base
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'slug',
        'keywords',
        'description',
        'sort',
        'pid',
    ];

    /**
     * 一对多关联文章
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function getUrlAttribute(): string
    {
        $parameters = [$this->id];

        if (Str::isTrue(config('bjyblog.seo.use_slug'))) {
            $parameters[] = $this->slug;
        }

        return url('categories', $parameters);
    }
}
