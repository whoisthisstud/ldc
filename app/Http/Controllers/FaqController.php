<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Requests\FaqStoreRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('is_active', 'DESC')
            ->orderBy('type')
            ->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->type == "general") {
            Faq::create($validated + ['is_general' => true]);
        } else {
            Faq::create($validated);
        }

        notify()->success('Your Frequently Asked Question has been added', 'FAQ Added');
        return redirect()->route('faqs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.create', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqStoreRequest $request, Faq $faq)
    {
        $validated = $request->validated();

        if ($request->type == "general") {
            Faq::where('id', $faq->id)->update($validated + ['is_general' => true]);
        } else {
            Faq::where('id', $faq->id)->update($validated);
        }

        notify()->success('Your Frequently Asked Question has been updated', 'FAQ Updated');
        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
