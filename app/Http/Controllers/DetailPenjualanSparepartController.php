<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\detail_penjualan_sparepart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Detail_Penjualan_Sparepart_Transformer;

class DetailPenjualanSparepartController extends RestController
{
    protected $transformer = detail_penjualan_sparepart_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_penjualan_sparepart = detail_penjualan_sparepart::all();
        return response()->json($detail_penjualan_sparepart,200);
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
            'ID_SPAREPARTS' => 'required',
            'JUMLAH_SPAREPART' => 'required',
            'SUBTOTAL_SPAREPART' => 'required',
            'HARGA_TAMPUNG_JUAL' => 'required'
        ]); 

        try{
            $detail_penjualan_sparepart = new detail_penjualan_sparepart;
            $detail_penjualan_sparepart->ID_TRANSAKSI=$request->ID_TRANSAKSI;
            $detail_penjualan_sparepart->ID_SPAREPARTS=$request->ID_SPAREPARTS;
            $detail_penjualan_sparepart->JUMLAH_SPAREPART=$request->JUMLAH_SPAREPART;
            $detail_penjualan_sparepart->SUBTOTAL_SPAREPART=$request->SUBTOTAL_SPAREPART;
            $detail_penjualan_sparepart->HARGA_TAMPUNG_JUAL=$request->HARGA_TAMPUNG_JUAL;
            $detail_penjualan_sparepart->save();
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
            $detail_penjualan_sparepart=detail_penjualan_sparepart::find($id);
            $response = $this->generateItem($detail_penjualan_sparepart);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('detail_penjualan_sparepart is not found!');
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
                'ID_SPAREPARTS' => 'required',
                'JUMLAH_SPAREPART' => 'required',
                'SUBTOTAL_SPAREPART' => 'required',
                'HARGA_TAMPUNG_JUAL' => 'required'
            ]); 

            $detail_penjualan_sparepart=detail_penjualan_sparepart::find($id);

            $detail_penjualan_sparepart->update([
                'ID_TRANSAKSI'=>$request->ID_TRANSAKSI,      
                'ID_SPAREPARTS'=>$request->ID_SPAREPARTS,
                'JUMLAH_SPAREPART'=>$request->JUMLAH_SPAREPART,
                'SUBTOTAL_SPAREPART'=>$request->SUBTOTAL_SPAREPART,
                'HARGA_TAMPUNG_JUAL'=>$request->HARGA_TAMPUNG_JUAL
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('detail_penjualan_sparepart is not found!');
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
            $detail_penjualan_sparepart=detail_penjualan_sparepart::find($id);
            $detail_penjualan_sparepart->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('detail_penjualan_sparepart is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
