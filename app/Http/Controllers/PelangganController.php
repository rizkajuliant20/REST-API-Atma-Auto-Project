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

class pelangganController extends RestController
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
    //'ID_CABANG','NAMA_pelanggan','ALAMAT_pelanggan','TELEPON_pelanggan','GAJI_pelanggan','USERNAME','PASSWORD','ROLE'
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'ID_CABANG' => 'required',
            'NAMA_pelanggan' => 'required',
            'ALAMAT_pelanggan' => 'required',
            'TELEPON_pelanggan' => 'required',
            'GAJI_pelanggan' => 'required',
            'USERNAME' => 'required',
            'PASSWORD' => 'required',
            'ROLE' => 'required'
        ]); 

        try{
            $pelanggan = new pelanggan;
            $pelanggan->ID_CABANG=$request->ID_CABANG;
            $pelanggan->NAMA_pelanggan=$request->NAMA_pelanggan;
            $pelanggan->ALAMAT_pelanggan=$request->ALAMAT_pelanggan;
            $pelanggan->TELEPON_pelanggan=$request->TELEPON_pelanggan;
            $pelanggan->GAJI_pelanggan=$request->GAJI_pelanggan;
            $pelanggan->USERNAME=$request->USERNAME;
            $pelanggan->PASSWORD=$request->PASSWORD;
            $pelanggan->ROLE=$request->ROLE;
            $success=$pelanggan->save();

            if($success){
                return response()->json('it is worked', 201);
            }else{
                return response()->json('failed to save the data!',500);
            }

        } catch (\Exception $e) {
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
            return $this->sendNotFoundResponse('employee not found!',500);
        } catch (\Exception $e) {
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
            $pelanggan=pelanggan::find($id);
            if(!is_null($request->NAMA_JASA)){
                $pelanggan->ID_CABANG=$request->ID_CABANG;
            }if(!is_null($request->NAMA_pelanggan))
            {
                $pelanggan->NAMA_pelanggan=$request->NAMA_pelanggan;
            }if(!is_null($request->ALAMAT_pelanggan))
            {
                $pelanggan->ALAMAT_pelanggan=$request->ALAMAT_pelanggan;
            }if(!is_null($request->TELEPON_pelanggan))
            {
                $pelanggan->TELEPON_pelanggan=$request->TELEPON_pelanggan;
            }if(!is_null($request->GAJI_pelanggan))
            {
                $pelanggan->GAJI_pelanggan=$request->GAJI_pelanggan;
            }if(!is_null($request->PASSWORD))
            {
                $pelanggan->PASSWORD=$request->PASSWORD;
            }if(!is_null($ROLE->HARGA_JASA))
            {
                $pelanggan->ROLE=$request->ROLE;
            }if(!is_null($request->HARGA_JASA))
            {
                $pelanggan->HARGA_JASA=$request->HARGA_JASA;
            }
            $success=$pelanggan->save();

            if($success){
                return response()->json('it is worked', 201);
            }else{
                return response()->json('failed to save the data!',500);
            }
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('employee not found!',500);
        }catch(\Exception $e) {
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
            return $this->sendNotFoundResponse('service not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}