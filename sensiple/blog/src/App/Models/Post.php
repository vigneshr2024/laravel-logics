<?php

namespace Sensiple\Blog\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'post_authors');
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(Industry::class, 'post_industries');
    }
    public function stacks(): BelongsToMany
    {
        return $this->belongsToMany(Stack::class, 'post_stacks');
    }
}
