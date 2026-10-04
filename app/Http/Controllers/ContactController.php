<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('contact.index', compact('categories', 'tags'));
    }

    public function confirm(StoreContactRequest $request)
    {
        $validated = $request->validated();

        $category = Category::find($validated['category_id']);

        $tagIds = $validated['tag_ids'] ?? [];

        $tags = Tag::whereIn('id', $tagIds)->get();

        return view('contact.confirm', compact('validated', 'category', 'tags'));
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        $tagIds = $validated['tag_ids'] ?? [];

        unset($validated['tag_ids']);

        $contact = Contact::create($validated);

        $contact->tags()->attach($tagIds);

        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }

}
