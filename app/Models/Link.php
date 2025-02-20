<?php

namespace App\Models;

use Database\Factories\LinkFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;

class Link extends Model
{
    /** @use HasFactory<LinkFactory> */
    use HasFactory;

    public function moveUp(): void
    {

        $this->move(-1);
    }

    public function moveDown(): void
    {
        $this->move(+1);
    }

    private  function move($to): RedirectResponse
    {
        $order = $this->sort;
        $newOrder = $order + $to;

        /**
         * @var User $user
         */
        $user = auth()->user();

        $swapWith = $user->links()->where('sort', '=', $newOrder)->first();

        $this->fill(['sort' => $newOrder])->save();
        $swapWith->fill(['sort' => $order])->save();

        return back();
    }
}
