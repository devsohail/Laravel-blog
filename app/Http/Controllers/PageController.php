<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Company;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        
        $comparisons = Post::whereHas('categories', function($query)  {
            $query->where('categories.id', 2);
        })
        ->where('featured', true)
        ->with('user', 'categories')
        ->get();
        $posts = Post::whereHas('categories', function($query)  {
            $query->where('categories.id', 1);
        })
        ->where('featured', true)
        ->with('user', 'categories')
        ->get();
        $companies = Company::where('is_featured', true)->get();
        $pricing = Pricing::all();
        return view('front.index', [
            'posts' => $posts,
            'companies' => $companies,
            'comparisons' => $comparisons,
            'pricing' => $pricing
        ]);
    }

    public function posts(){
        $posts = Post::with('user', 'categories')
                    ->get();
        $categories = Category::all();
        return view('front.posts.blog', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
    
    public function showPost(Post $post){
        $post = $post->load('user','categories');
        $categories = Category::all();
        return view('front.posts.show', compact('post', 'categories'));
    }

    public function showCategory(Category $category){
        $posts = $category->posts()->get();
        $categories = Category::all();
        return view('front.categories.show', compact('category', 'posts', 'categories'));
    }
}
