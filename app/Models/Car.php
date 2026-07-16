<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
#[Fillable(
    ['brand','model','engine','year','description','image' , 'hp' , 'user_id']
    )
]
class Car extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isuserowner()
    {
        return $this->user_id == auth()->user()->id;
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);

    }

}
