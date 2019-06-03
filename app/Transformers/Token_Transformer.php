<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\token;

class Token_Transformer extends TransformerAbstract
{
    /**
     * Transform Token.
     *
     * @param token $token
     */
    public function transform(token $token)
    {
        return [
            'TOKEN_USERNAME' => $token->TOKEN_USERNAME,
            'TOKEN_PASSWORD' => $token->TOKEN_PASSWORD,
            'generated_at' => $token->created_at->toDateTimeString(),
            'lastused_at' => $token->updated_at->toDateTimeString(),
        ];
    }
}