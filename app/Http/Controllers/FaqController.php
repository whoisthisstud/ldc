<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Requests\FaqStoreRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('is_active', 'DESC')
            ->orderBy('type')
            ->get();
        return view('admin.faqs.index2', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.create', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
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
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
