<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkProviderRequest;
use App\Http\Requests\UpdateLinkProviderRequest;
use App\Models\LinkProvider;
use Illuminate\Http\Request;

class LinkProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link_providers = LinkProvider::all();
        return view('admin.link-provider.index', compact('link_providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link-provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLinkProviderRequest $request)
    {
        $link_provider = LinkProvider::create($request->validated());
        session()->flash('link_provider-created-message', $link_provider['title'] . ' created');
        return redirect()->route('link_providers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\link_provider  $link_provider
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkProvider $link_provider)
    {
        return view('admin.link-provider.edit', compact('link_provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\link_provider  $link_provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLinkProviderRequest $request, LinkProvider $link_provider)
    {
        $link_provider->update($request->validated());
        session()->flash('link_provider-updated-message', $link_provider['title'] . ' updated');
        return redirect()->route('link_providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\link_provider  $link_provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkProvider $link_provider)
    {
        $link_provider->delete();
        session()->flash('link_provider-deleted-message', $link_provider['title'] . ' was deleted');
        return redirect()->route('link_providers.index');
    }
}
