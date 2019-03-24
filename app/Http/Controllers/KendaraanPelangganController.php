<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kendaraan_pelanggan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Kendaraan_Pelanggan_Transformer;

class KendaraanPelangganController extends RestController
{
    protected $transformer = Kendaraan_Pelanggan_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan_pelanggan = kendaraan_pelanggan::all();
        return response()->json($kendaraan_pelanggan,200);
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
            'ID_MOTOR' => 'required',
            'ID_PELANGGAN' => 'required',
            'NO_PLAT' => 'required'
        ]); 

        try{
            $kendaraan_pelanggan = new kendaraan_pelanggan;
            $kendaraan_pelanggan->ID_MOTOR=$request->ID_MOTOR;
            $kendaraan_pelanggan->ID_PELANGGAN=$request->ID_PELANGGAN;
            $kendaraan_pelanggan->NO_PLAT=$request->NO_PLAT;
            $kendaraan_pelanggan->save();
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
            $kendaraan_pelanggan=kendaraan_pelanggan::find($id);
            $response = $this->generateItem($kendaraan_pelanggan);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Bike is not found!');
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
                'ID_MOTOR' => 'required',
                'ID_PELANGGAN' => 'required',
                'NO_PLAT' => 'required'
            ]); 

            $kendaraan_pelanggan=kendaraan_pelanggan::find($id);

            $kendaraan_pelanggan->update([
                'ID_MOTOR'=>$request->ID_MOTOR,          
                'ID_PELANGGAN'=>$request->ID_PELANGGAN,
                'NO_PLAT'=>$request->NO_PLAT
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Bike is not found');
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
            $kendaraan_pelanggan=kendaraan_pelanggan::find($id);
            $kendaraan_pelanggan->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Bike is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
