<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    private static array $faqRoutes = [
        ['method' => 'get', 'uri' => 'faq/create', 'action' => 'create', 'name' => 'faq.create'],
        ['method' => 'get', 'uri' => 'faq/edit', 'action' => 'edit', 'name' => 'faq.edit'],
        ['method' => 'post', 'uri' => 'faq', 'action' => 'store', 'name' => 'faq.store'],
        ['method' => 'get', 'uri' => 'faq', 'action' => 'index', 'name' => 'faq.index'],
        ['method' => 'put', 'uri' => 'faq/update', 'action' => 'update', 'name' => 'faq.update'],
        ['method' => 'delete', 'uri' => 'faq/{faq}', 'action' => 'delete', 'name' => 'faq.delete']
    ];

    /**
     * Method for getting the routes, required by the faq page.
     * @return array|array[] of the routes
     */
    public static function getRoutes(): array
    {
        return self::$faqRoutes;
    }

    /**
     * Method for displaying all questions and answer to the faq index view.
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('faq.index', [
            'faqs' => Faqs::all()
        ]);
    }

    /**
     * Method that takes the user to a faq create page.
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('faq.create');
    }

    /**
     * Method for storing the inputted data into the database after validating it.
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        // Validate the request data
        $validatedData = request()->validate([
            'question' => 'required|string|min:10',
            'answer' => 'required|string|min:10',
        ]);

        // Create and save the article
        $faq = new Faqs();
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->uri = '';
        $faq->save();

        return redirect()->route('faq.index');
    }

    /**
     * Method for deleting a question and answer.
     * @param Faqs $faq
     * @return RedirectResponse
     */
    public function delete(Faqs $faq): RedirectResponse
    {
        // Delete the article
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'Article deleted successfully.');
    }

    /**
     * Method for editing a question and answer
     * @param Faqs $faq
     * @return Factory|View|Application
     */
    public function edit(Faqs $faq): Factory|View|Application
    {
        return view('faq.edit', [
            'faq' => $faq
        ]);
    }


    public function update(Faqs $faq): RedirectResponse
    {
        // Validate the request data
        $validatedData = request()->validate([
            'question' => 'required|string|min:10',
            'answer' => 'required|string|min:10',
        ]);

        $faq->update($validatedData);

        return redirect()->route('faq.index');
    }
}
