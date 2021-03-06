<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'biography', 'born', 'died',
    ];

    /**
     * Автор может иметь множество книг
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'author_book');
    }


    /**
     * Пользователь владеет автором
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function isOwner(User $user)
    {
        return ($this->user_id === $user->id);
    }
}
