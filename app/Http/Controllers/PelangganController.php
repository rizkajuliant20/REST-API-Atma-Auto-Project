<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pelanggan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Pelanggan_Transformer;

class PelangganController extends RestController
{
    protected $transformer = Pelanggan_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = pelanggan::all();
        return response()->json($pelanggan,200);
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
            'NAMA_PELANGGAN' => 'required',
            'TELEPON_PELANGGAN' => 'required',
            'ALAMAT_PELANGGAN' => 'required'
        ]); 

        try{
            $pelanggan = new pelanggan;
            $pelanggan->NAMA_PELANGGAN=$request->NAMA_PELANGGAN;
            $pelanggan->TELEPON_PELANGGAN=$request->TELEPON_PELANGGAN;
            $pelanggan->ALAMAT_PELANGGAN=$request->ALAMAT_PELANGGAN;
            $success=$pelanggan->save();
            return response()->json('Success', 200);
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pelanggan=pelanggan::find($id);
            $response = $this->generateItem($pelanggan);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Customer is not found');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $this->validate($request,[
                'NAMA_PELANGGAN' => 'required',
                'TELEPON_PELANGGAN' => 'required',
                'ALAMAT_PELANGGAN' => 'required'
            ]); 

            $pelanggan=pelanggan::find($id);

            $pelanggan->update([
                'NAMA_PELANGGAN'=>$request->NAMA_PELANGGAN,
                'TELEPON_PELANGGAN'=>$request->TELEPON_PELANGGAN,
                'ALAMAT_PELANGGAN'=>$request->ALAMAT_PELANGGAN,
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Customer is not found!');
        }catch(\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pelanggan=pelanggan::find($id);
            $pelanggan->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Customer not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}