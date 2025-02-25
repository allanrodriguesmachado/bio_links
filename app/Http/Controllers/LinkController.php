<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

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
    public function store(StoreLinkRequest $request): RedirectResponse
    {
        /**
         * @var User $user;
         */
        $user = auth()->user();
        $user->links()->create($request->validated());

        return to_route('dashboard');
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Link $link)
    {
        $this->authorize('update', $link);

       return view('links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->fill($request->validated())->save();

        return to_route('dashboard', with([
            'message' => 'Link updated successfully',
        ]));
    }

    public function destroy(Link $link): RedirectResponse
    {
        $link->delete();

        return to_route('dashboard', with([
            'message' => 'Link deleted successfully',
        ]));
    }

    public function up(Link $link)
    {
        $link->moveUp();

       return back();
    }

    public function down(Link $link) {
        $link->moveDown();

        return back();
    }
}
