<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $annonces = Category::all();
        $type = $request->input('type');
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $location = $request->input('location');

        $posts = Post::query()
            ->with(['user', 'category'])
            ->when($type, function ($query, $type) {
                return $query->ofType($type);
            })
            ->search($search)
            ->ofCategory($categoryId)
            ->inLocation($location)
            ->latest()
            ->paginate(12);

        $totalPosts = Post::count();

        return view('posts.index', compact('posts', 'annonces', 'totalPosts'));
    }

    // Les autres méthodes du contrôleur...
}
