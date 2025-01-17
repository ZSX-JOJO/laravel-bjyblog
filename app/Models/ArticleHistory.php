<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleHistory extends Base
{
    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'article_id',
        'markdown',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
