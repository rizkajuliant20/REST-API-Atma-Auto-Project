<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\detail_pemesanan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Detail_Pemesanan_Transformer;

class DetailPemesananController extends RestController
{
    protected $transformer = detail_pemesanan_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_pemesanan = detail_pemesanan::all();
        return response()->json($detail_pemesanan,200);
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
            'ID_SPAREPARTS' => 'required',
            'ID_PEMESANAN' => 'required',
            'JUMLAH_PEMESANAN' => 'required',
            'HARGA_BELI_PEMESANAN' => 'required',
            'SATUAN' => 'required'
        ]); 

        try{
            $detail_pemesanan = new detail_pemesanan;
            $detail_pemesanan->ID_SPAREPARTS=$request->ID_SPAREPARTS;
            $detail_pemesanan->ID_PEMESANAN=$request->ID_PEMESANAN;
            $detail_pemesanan->JUMLAH_PEMESANAN=$request->JUMLAH_PEMESANAN;
            $detail_pemesanan->HARGA_BELI_PEMESANAN=$request->HARGA_BELI_PEMESANAN;
            $detail_pemesanan->SATUAN=$request->SATUAN;
            $detail_pemesanan->save();
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
            $detail_pemesanan=detail_pemesanan::find($id);
            $response = $this->generateItem($detail_pemesanan);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Detail_pemesanan is not found!');
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
                'ID_SPAREPARTS' => 'required',
                'ID_PEMESANAN' => 'required',
                'JUMLAH_PEMESANAN' => 'required',
                'HARGA_BELI_PEMESANAN' => 'required',
                'SATUAN' => 'required'
            ]); 

            $detail_pemesanan=detail_pemesanan::find($id);

            $detail_pemesanan->update([
                'ID_SPAREPARTS'=>$request->ID_SPAREPARTS,      
                'ID_PEMESANAN'=>$request->ID_PEMESANAN,        
                'JUMLAH_PEMESANAN'=>$request->JUMLAH_PEMESANAN,
                'HARGA_BELI_PEMESANAN'=>$request->HARGA_BELI_PEMESANAN,
                'SATUAN'=>$request->SATUAN
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Detail_pemesanan is not found!');
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
            $detail_pemesanan=detail_pemesanan::find($id);
            $detail_pemesanan->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Detail_pemesanan is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
    
    public function hapusDetailOrder($idorder, $idspa)
    {
        try {
            $detail_pemesanan=detail_pemesanan::where('ID_PEMESANAN', $idorder)->where('ID_SPAREPARTS',$idspa)->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('404_not_found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
