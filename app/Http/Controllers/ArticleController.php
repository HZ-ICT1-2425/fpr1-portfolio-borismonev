<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'articles' => Articles::all()
        ]);
    }

    public function show(Articles $article)
    {
        return view('blog.show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store()
    {
        // Validate the request data
        $validatedData = request()->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'short_description' => 'required|string',
            'text' => 'required|string',
        ]);

        // Create and save the article
        $article = new Articles();
        $article->title = $validatedData['title'];
        $article->author = $validatedData['author'];
        $article->short_description = $validatedData['short_description'];
        $article->text = $validatedData['text'];
        $article->uri = Str::slug($validatedData['title'], '-');
        $article->save();

        // Redirect to the blog index page
        return redirect()->route('blog.show', ['article' => $article->uri]);
    }


    public function delete(Articles $article)
    {
        // Delete the article
        $article->delete();

        // Redirect to the articles list (blog index)
        return redirect()->route('blog.index')->with('success', 'Article deleted successfully.');
    }

}
