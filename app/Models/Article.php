<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
/**
 * @mixin Builder
 */
class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug', 'description_short','description','meta_title','meta_description','meta_keyword','published','image','image_show','created_by','modified_by'];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title,0,40).'-'.Carbon::now()->format('dmyHi'),'-');
    }

    // Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Models\Category','categoryable');
    }
    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at','desc')->take($count)->get();
    }
}
