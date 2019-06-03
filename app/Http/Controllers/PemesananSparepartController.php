<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pemesanan_sparepart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Pemesanan_Sparepart_Transformer;

class PemesananSparepartController extends RestController
{
    protected $transformer = pemesanan_sparepart_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan_sparepart = pemesanan_sparepart::all();
        return response()->json($pemesanan_sparepart,200);
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
            'ID_SUPPLIER' => 'required',
            'TGL_PEMESANAN' => 'required',
            'GRANDTOTAL_PEMESANAN' => 'required',
            'STATUS_PEMESANAN' => 'required'
        ]); 

        try{
            $pemesanan_sparepart = new pemesanan_sparepart;
            $pemesanan_sparepart->ID_SUPPLIER=$request->ID_SUPPLIER;
            $pemesanan_sparepart->TGL_PEMESANAN=$request->TGL_PEMESANAN;
            $pemesanan_sparepart->GRANDTOTAL_PEMESANAN=$request->GRANDTOTAL_PEMESANAN;
            $pemesanan_sparepart->STATUS_PEMESANAN=$request->STATUS_PEMESANAN;
            $pemesanan_sparepart->save();
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
            $pemesanan_sparepart=pemesanan_sparepart::find($id);
            $response = $this->generateItem($pemesanan_sparepart);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Pemesanan_sparepart is not found!');
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
                'ID_SUPPLIER' => 'required',
                'TGL_PEMESANAN' => 'required',
                'GRANDTOTAL_PEMESANAN' => 'required',
                'STATUS_PEMESANAN' => 'required'
            ]); 

            $pemesanan_sparepart=pemesanan_sparepart::find($id);

            $pemesanan_sparepart->update([
                'ID_SUPPLIER'=>$request->ID_SUPPLIER,      
                'GRANDTOTAL_PEMESANAN'=>$request->GRANDTOTAL_PEMESANAN,        
                'TGL_PEMESANAN'=>$request->TGL_PEMESANAN,
                'STATUS_PEMESANAN' => $request->STATUS_PEMESANAN
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('pemesanan_sparepart is not found!');
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
            $pemesanan_sparepart=pemesanan_sparepart::find($id);
            $pemesanan_sparepart->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('status_pemesanan is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
