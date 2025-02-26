<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
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
        $popularPosts = Post::orderBy('views', 'desc')->take(5)->get();

        return view('posts.index', compact('posts', 'categories', 'totalPosts', 'popularPosts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:lost,found',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/posts');
            $validated['image'] = Storage::url($path);
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Annonce créée avec succès!');
    }

    public function show(Post $post)
    {
        // Incrémenter le nombre de vues
        $post->increment('views');

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:lost,found',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($post->image) {
                Storage::delete(str_replace('/storage', 'public', $post->image));
            }
            $path = $request->file('image')->store('public/posts');
            $validated['image'] = Storage::url($path);
        }

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Annonce mise à jour avec succès!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        // Supprimer l'image si elle existe
        if ($post->image) {
            Storage::delete(str_replace('/storage', 'public', $post->image));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Annonce supprimée avec succès!');
    }

    public function dashboard()
    {
        $userPosts = Auth::user()->posts()->latest()->get();
        return view('dashboard', compact('userPosts'));
    }
}
