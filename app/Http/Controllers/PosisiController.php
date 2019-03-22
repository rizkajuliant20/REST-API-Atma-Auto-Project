<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\posisi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Posisi_Transformer;

class PosisiController extends RestController
{
    protected $transformer = Posisi_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posisi = posisi::all();
        return response()->json($posisi,200);
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
    //'ID_CABANG','NAMA_posisi','ALAMAT_posisi','TELEPON_posisi','GAJI_posisi','USERNAME','PASSWORD','ROLE'
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'KODE_PENEMPATAN' => 'required',
            'KETERANGAN' => 'required'
        ]); 

        try{
            $posisi = new posisi;
            $posisi->KODE_PENEMPATAN=$request->KODE_PENEMPATAN;
            $posisi->KETERANGAN=$request->KETERANGAN;
            $success=$posisi->save();

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
            $posisi=posisi::find($id);
            $response = $this->generateItem($posisi);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('position is not found!',500);
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
            $posisi=posisi::find($id);
            if(!is_null($request->KODE_PENEMPATAN)){
                $posisi->KODE_PENEMPATAN=$request->KODE_PENEMPATAN;
            }if(!is_null($request->KETERANGAN))
            {
                $posisi->KETERANGAN=$request->KETERANGAN;
            }

            $success=$posisi->save();

            if($success){
                return response()->json('it is worked', 201);
            }else{
                return response()->json('failed to save the data!',500);
            }
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('position is not found!',500);
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
            $posisi=posisi::find($id);
            $posisi->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('service not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}