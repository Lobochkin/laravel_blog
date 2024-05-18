<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug', 'parent_id','published','created_by','modified_by'];
    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title,0,40).'-'.Carbon::now()->format('dmyHi'),'-');
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $model->created_by = Auth::id();
            $model->modified_by = Auth::id();
        });
        static::updating(function($model)
        {
            $model->modified_by = Auth::id();
        });
    }
    public function children()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    // Polymorphic relation with article
    public function article()
    {
        return $this->morphedByMany('App\Models\Article','categoryable');
    }
    public function scopeLastCotegories($query, $count)
    {
        return $query->orderBy('created_at','desc')->take($count)->get();
    }
}
