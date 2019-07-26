<?php

namespace App\Repository;


use App\Token;

class TokenRepository
{

    public function create(string $email, $category)
    {
        return Token::create([
            'token'         => sha1(md5(rand())),
            'category_id'   => $category,
            'email'         => $email,
            'user_id'       => auth()->id()
        ]);

    }
}