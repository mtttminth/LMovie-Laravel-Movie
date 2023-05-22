<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkProviderRequest;
use App\Http\Requests\UpdateLinkProviderRequest;
use App\Models\LinkProvider;
use Illuminate\Http\Request;

class LinkProviderController extends Controller
{
    public function index()
    {
        $link_providers = LinkProvider::all();
        return view('admin.link-provider.index', compact('link_providers'));
    }

    public function create()
    {
        return view('admin.link-provider.create');
    }

    public function store(StoreLinkProviderRequest $request)
    {
        $link_provider = LinkProvider::create($request->validated());
        session()->flash('link_provider-created-message', $link_provider['title'] . ' created');
        return redirect()->route('link_providers.index');
    }

    public function edit(LinkProvider $link_provider)
    {
        return view('admin.link-provider.edit', compact('link_provider'));
    }

    public function update(UpdateLinkProviderRequest $request, LinkProvider $link_provider)
    {
        $link_provider->update($request->validated());
        session()->flash('link_provider-updated-message', $link_provider['title'] . ' updated');
        return redirect()->route('link_providers.index');
    }

    public function destroy(LinkProvider $link_provider)
    {
        $link_provider->delete();
        session()->flash('link_provider-deleted-message', $link_provider['title'] . ' was deleted');
        return redirect()->route('link_providers.index');
    }
}
