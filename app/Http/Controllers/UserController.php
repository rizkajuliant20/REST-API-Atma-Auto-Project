<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\User_Transformer;
use Hash;

class UserController extends RestController
{
    protected $transformer = User_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $response = $this->generateCollection($users);
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
        $this->validate($request,[
            'username' => 'required',
            'password'=> 'required',
        ]);   
        try {
                $users = new User;
                $users->username=$request->get('username');
                $users->password=$request->get('password');
                $users->save();

                $response = $this->generateItem($Users);

                return $this->sendResponse($response, 201);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $users=User::find($id);
            $response = $this->generateItem($users);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('User not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try {
            $users = User::find($id);
            $users->username=$request->get('username');
            $users->password=$request->get('password');
            $users->save();
            $response = $this->generateItem($Users);
            return $this->sendResponse($response, 200);
        }catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('User not found!');
        }
        catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Users=User::find($id);
            $Users->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('User not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
    
    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        
        try {
            $users = User::where('username',$request->get('username'))->first();
            if($users){
                if (check($request->get('password'), $users->password))
                {
                    $response = $this->generateItem($users);
                    return $this->sendResponse($response, 201);
                }
                else{
                    return response()->json('Wrong Password'); 
                }
            }
            else
            {
                return response()->json('username Not Found'); 
            }
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('user_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
