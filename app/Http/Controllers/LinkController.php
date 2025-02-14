<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;

class LinkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request): \Illuminate\Http\RedirectResponse
    {

        /**
         * @var User $user;
         */
        $user = auth()->user();
        $user->links()->create($request->validated());

        return to_route('dashboard');
    }

    public function edit(Link $link)
    {
       return view('links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
//        $link->link = $request->link;
//        $link->name = $request->name;
//        $link->save();

        $link->fill($request->validated())->save();

        return to_route('dashboard', with([
            'message' => 'Link updated successfully',
        ]));
    }

    public function destroy(Link $link)
    {
        //
    }
}
