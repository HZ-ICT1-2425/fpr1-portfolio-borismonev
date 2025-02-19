<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    private static array $blogRoutes = [
        ['method' => 'get', 'uri' => 'blog/create', 'action' => 'create', 'name' => 'blog.create'],
        ['method' => 'post', 'uri' => 'articles', 'action' => 'store', 'name' => 'articles.store'],
        ['method' => 'get', 'uri' => 'blog', 'action' => 'index', 'name' => 'blog.index'],
        ['method' => 'get', 'uri' => 'blog/{article:uri}', 'action' => 'show', 'name' => 'blog.show'],
        ['method' => 'put', 'uri' => 'blog/{article:uri}', 'action' => 'update', 'name' => 'articles.update'],
        ['method' => 'delete', 'uri' => 'blog/{article:uri}', 'action' => 'delete', 'name' => 'blog.delete'],
        ['method' => 'get', 'uri' => 'blog/{article:uri}/edit', 'action' => 'edit', 'name' => 'blog.edit']
    ];

    /**
     * Method for getting the routes, required by the blog page.
     * @return array|array[] of the routes
     */
    public static function getRoutes(): array
    {
        return self::$blogRoutes;
    }

    /**
     * Method for displaying all blog articles on the blog index view.
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('blog.index', [
            'articles' => Articles::all()
        ]);
    }

    /**
     * Method for showing the article.
     * @param Articles $article
     * @return Factory|View|Application
     */
    public function show(Articles $article): Factory|View|Application
    {
        return view('blog.show', [
            'article' => $article
        ]);
    }

    /**
     * Method that takes the user to an article create page.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('blog.create');
    }

    /**
     * Method for storing the inputted data into the database after validating it.
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
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

    /**
     * Method for deleting the article.
     * @param Articles $article
     * @return RedirectResponse
     */
    public function delete(Articles $article): RedirectResponse
    {
        // Delete the article
        $article->delete();

        // Redirect to the articles list (blog index)
        return redirect()->route('blog.index')->with('success', 'Article deleted successfully.');
    }

    /**
     * Method for editing the article.
     * @param Articles $article
     * @return Factory|View|Application
     */
    public function edit(Articles $article): Factory|View|Application
    {
        return view('blog.edit', [
            'article' => $article
        ]);
    }

    /**
     * Method that updates the data in the database after the user has edited the article.
     * @param Articles $article
     * @return RedirectResponse
     */
    public function update(Articles $article)
    {
        // Validate the request data
        $validatedData = request()->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'short_description' => 'required|string',
            'text' => 'required|string',
        ]);

        $article->update($validatedData);

        // Redirect to the blog index page
        return redirect()->route('blog.show', ['article' => $article->uri]);
    }
}
