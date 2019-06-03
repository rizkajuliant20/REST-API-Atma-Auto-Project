<?php

namespace App\Http\Controllers;

use App\token;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\User;
use App\Transformers\Token_Transformer;
use App\Transformers\User_Transformer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\InvalidTokenException;
use App\Exceptions\InvalidCredentialException;
use Hash;
use App\Events\TokenRefresh;

class TokenController extends RestController
{

    protected $transformer = Token_Transformer::class;

    public function Auth(Request $request)
    {
        try {
            $user = $this->validateUser(
                $request->get('username'), 
                $request->get('password'));

            $now = Carbon::now();
            $token = new token;
            $token->id=$user->id;
            $token->TOKEN_USERNAME=str_random(7);
            $token->TOKEN_PASSWORD=str_random(9);

            $token->save();

            $response = $this->generateItem($token);
            return $this->sendResponse($response, 200);
        } catch (InvalidCredentialExcpetion $e) {
            return $this->sendNotAuthorizeResponse($e->getMessage());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function mobileAuth(Request $request)
    {
        try {
            $user = $this->validateUser(
                $request->get('username'), 
                $request->get('password'));

            $response = $this->generateItem($user, User_Transformer::class);

            return $this->sendResponse($response, 201);
        } catch (InvalidCredentialExcpetion $e) {
            return $this->sendNotAuthorizeResponse($e->getMessage());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function validateUser($username ,$password)
    {
        try{
            $user = User::where('username', $username)->firstOrFail();
            if(!password_verify($password, $user->password)){
                throw new InvalidCredentialException();
            }
            return $user;
        } catch(ModelNotFoundException $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function validateToken(Request $request)
    {
        try {
            $header = $request->header('Authorization');
            list($type, $payload) = explode(" ", $header);
            list($username, $password) = explode(":", base64_decode($payload));
            $token = token::where('TOKEN_USERNAME', $username)->first();
            $user = User::find($token->id);
            event(new TokenRefresh($token));
            $item = $this->generateItem($user, User_Transformer::class);
            return $this->sendResponse($item);
        } catch (\Exception $e) {
            return $this->sendNotAuthorizeResponse($e->getMessage());
        } catch (InvalidTokenException $e) {
            throw $e;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = token::all();
        $response = $this->generateCollection($tokens);
        return $this->sendResponse($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\token  $token
     * @return \Illuminate\Http\Response
     */
    public function show(token $token)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\token  $token
     * @return \Illuminate\Http\Response
     */
    public function edit(token $token)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\token  $token
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, token $token)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\token  $token
     * @return \Illuminate\Http\Response
     */
    public function destroy(token $token)
    {
        //
    }
}
