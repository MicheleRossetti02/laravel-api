<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'source_code', 'project_link', 'slug', 'cover_image','category_id'];

    public static function generateSlag($title)
    {

        $song_slug = Str::slug($title);
        return $song_slug;
    } 

    /**
     * Get the category that owns the song
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class);
    }

    /**
     * Get the roles that owns the song
     *
@return \Illuminate\Database\Eloquent\Relations\BelongsToMany;
     * 
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
