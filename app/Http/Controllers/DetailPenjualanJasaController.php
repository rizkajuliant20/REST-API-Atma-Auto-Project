<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\detail_penjualan_jasa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Detail_Penjualan_Jasa_Transformer;

class DetailPenjualanJasaController extends RestController
{
    protected $transformer = detail_penjualan_jasa_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_penjualan_jasa = detail_penjualan_jasa::all();
        return response()->json($detail_penjualan_jasa,200);
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
            'ID_JASA' => 'required',
            'ID_MONTIR_ONDUTY' => 'required',
            'SUBTOTAL_JASA' => 'required',
            'STATUS_JASA' => 'required'
        ]); 

        try{
            $detail_penjualan_jasa = new detail_penjualan_jasa;
            $detail_penjualan_jasa->ID_TRANSAKSI=$request->ID_TRANSAKSI;
            $detail_penjualan_jasa->ID_JASA=$request->ID_JASA;
            $detail_penjualan_jasa->ID_MONTIR_ONDUTY=$request->ID_MONTIR_ONDUTY;
            $detail_penjualan_jasa->SUBTOTAL_JASA=$request->SUBTOTAL_JASA;
            $detail_penjualan_jasa->STATUS_JASA=$request->STATUS_JASA;
            $detail_penjualan_jasa->save();
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
            $detail_penjualan_jasa=detail_penjualan_jasa::find($id);
            $response = $this->generateItem($detail_penjualan_jasa);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Detail_penjualan_jasa is not found!');
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
                'ID_TRANSAKSI' => 'required',
                'ID_JASA' => 'required',
                'ID_MONTIR_ONDUTY' => 'required',
                'SUBTOTAL_JASA' => 'required',
                'STATUS_JASA' => 'required'
            ]); 

            $detail_penjualan_jasa=detail_penjualan_jasa::find($id);

            $detail_penjualan_jasa->update([
                'ID_TRANSAKSI'=>$request->ID_TRANSAKSI,      
                'ID_JASA'=>$request->ID_JASA,        
                'ID_MONTIR_ONDUTY'=>$request->ID_MONTIR_ONDUTY,
                'SUBTOTAL_JASA'=>$request->SUBTOTAL_JASA,
                'STATUS_JASA'=>$request->STATUS_JASA
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Detail_penjualan_jasa is not found!');
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
            $detail_penjualan_jasa=detail_penjualan_jasa::find($id);
            $detail_penjualan_jasa->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Detail_penjualan_jasa is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
