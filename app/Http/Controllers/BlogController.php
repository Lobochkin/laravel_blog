<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category',[
            'category' => $category,
            'articles' => $category->article()->where('published',1)->paginate(6)
        ]);
    }

    public function article($slug)
    {
        $article = Article::where('slug',$slug)->first();

        return view('blog.article',compact('article'));
    }
}
