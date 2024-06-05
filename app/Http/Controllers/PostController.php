<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function galeri()
{
    $posts = Post::all();
    return view('posts.galeri', compact('posts'));
}

public function blog()
{
    $posts = Post::all();
    return view('posts.blog', compact('posts'));
}



    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }

    
    public function showSuggestionForm()
    {
        return view('suggestions.form');
    }

    // Store the submitted suggestion
    public function storeSuggestion(Request $request)
    {   
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'suggestion' => 'required|string',
        ]);

        // // Create a new suggestion
        // $suggestion = new Suggestion();
        // $suggestion->name = $request->name;
        // $suggestion->suggestion = $request->suggestion;
        // $suggestion->save();

        Suggestion::create([
            'name' => $request->name,
            'suggestion' => $request->suggestion,
        ]);
        
        // Redirect with a success message
        return redirect()->back()->with('success', 'Thank you for your suggestion!');
    }

}




