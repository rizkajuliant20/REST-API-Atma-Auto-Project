<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\transaksi_penjualan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Transaksi_Penjualan_Transformer;

class TransaksiPenjualanController extends RestController
{
    protected $transformer = transaksi_penjualan_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi_penjualan = transaksi_penjualan::all();
        return response()->json($transaksi_penjualan,200);
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
            'ID_TRANSAKSI' => 'required',
            'ID_CABANG' => 'required',
            'ID_PELANGGAN' => 'required',
            'TGL_TRANSAKSI' => 'required',
            'SUBTOTAL' => 'required',
            'DISKON' => 'required',
            'GRANDTOTAL' => 'required',
            'STATUS_TRANSAKSI' => 'required',
            'JENIS_TRANSAKSI' => 'required'
        ]); 

        try{
            $transaksi_penjualan = new transaksi_penjualan;
            $transaksi_penjualan->ID_TRANSAKSI=$request->ID_TRANSAKSI;
            $transaksi_penjualan->ID_CABANG=$request->ID_CABANG;
            $transaksi_penjualan->ID_PELANGGAN=$request->ID_PELANGGAN;
            $transaksi_penjualan->TGL_TRANSAKSI=$request->TGL_TRANSAKSI;
            $transaksi_penjualan->SUBTOTAL=$request->SUBTOTAL;
            $transaksi_penjualan->DISKON=$request->DISKON;
            $transaksi_penjualan->GRANDTOTAL=$request->GRANDTOTAL;
            $transaksi_penjualan->STATUS_TRANSAKSI=$request->STATUS_TRANSAKSI;
            $transaksi_penjualan->JENIS_TRANSAKSI=$request->JENIS_TRANSAKSI;
            $transaksi_penjualan->save();
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
            $transaksi_penjualan=transaksi_penjualan::find($id);
            $response = $this->generateItem($transaksi_penjualan);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('transaksi_penjualan is not found!');
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
                'ID_CABANG' => 'required',
                'ID_PELANGGAN' => 'required',
                'TGL_TRANSAKSI' => 'required',
                'SUBTOTAL' => 'required',
                'DISKON' => 'required',
                'GRANDTOTAL' => 'required',
                'STATUS_TRANSAKSI' => 'required',
                'JENIS_TRANSAKSI' => 'required'
            ]); 

            $transaksi_penjualan=transaksi_penjualan::find($id);

            $transaksi_penjualan->update([
                'ID_CABANG'=>$request->ID_CABANG,      
                'ID_PELANGGAN'=>$request->ID_PELANGGAN,        
                'TGL_TRANSAKSI'=>$request->TGL_TRANSAKSI,
                'SUBTOTAL'=>$request->SUBTOTAL,
                'DISKON'=>$request->DISKON,
                'GRANDTOTAL'=>$request->GRANDTOTAL,
                'STATUS_TRANSAKSI'=>$request->STATUS_TRANSAKSI,
                'JENIS_TRANSAKSI'=>$request->JENIS_TRANSAKSI,
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('transaksi_penjualan is not found!');
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
            $transaksi_penjualan=transaksi_penjualan::find($id);
            $transaksi_penjualan->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('transaksi_penjualan is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
