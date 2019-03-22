<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pegawai;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Pegawai_Transformer;

class PegawaiController extends RestController
{
    protected $transformer = Pegawai_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = pegawai::all();
        return response()->json($pegawai,200);
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
    //'ID_CABANG','NAMA_PEGAWAI','ALAMAT_PEGAWAI','TELEPON_PEGAWAI','GAJI_PEGAWAI','USERNAME','PASSWORD','ROLE'
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'ID_CABANG' => 'required',
            'NAMA_PEGAWAI' => 'required',
            'ALAMAT_PEGAWAI' => 'required',
            'TELEPON_PEGAWAI' => 'required',
            'GAJI_PEGAWAI' => 'required',
            'USERNAME' => 'required',
            'PASSWORD' => 'required',
            'ROLE' => 'required'
        ]); 

        try{
            $pegawai = new pegawai;
            $pegawai->ID_CABANG=$request->ID_CABANG;
            $pegawai->NAMA_PEGAWAI=$request->NAMA_PEGAWAI;
            $pegawai->ALAMAT_PEGAWAI=$request->ALAMAT_PEGAWAI;
            $pegawai->TELEPON_PEGAWAI=$request->TELEPON_PEGAWAI;
            $pegawai->GAJI_PEGAWAI=$request->GAJI_PEGAWAI;
            $pegawai->USERNAME=$request->USERNAME;
            $pegawai->PASSWORD=$request->PASSWORD;
            $pegawai->ROLE=$request->ROLE;
            $success=$pegawai->save();

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
            $pegawai=pegawai::find($id);
            $response = $this->generateItem($pegawai);
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
            $pegawai=pegawai::find($id);
            if(!is_null($request->NAMA_JASA)){
                $pegawai->ID_CABANG=$request->ID_CABANG;
            }if(!is_null($request->NAMA_PEGAWAI))
            {
                $pegawai->NAMA_PEGAWAI=$request->NAMA_PEGAWAI;
            }if(!is_null($request->ALAMAT_PEGAWAI))
            {
                $pegawai->ALAMAT_PEGAWAI=$request->ALAMAT_PEGAWAI;
            }if(!is_null($request->TELEPON_PEGAWAI))
            {
                $pegawai->TELEPON_PEGAWAI=$request->TELEPON_PEGAWAI;
            }if(!is_null($request->GAJI_PEGAWAI))
            {
                $pegawai->GAJI_PEGAWAI=$request->GAJI_PEGAWAI;
            }if(!is_null($request->PASSWORD))
            {
                $pegawai->PASSWORD=$request->PASSWORD;
            }if(!is_null($ROLE->HARGA_JASA))
            {
                $pegawai->ROLE=$request->ROLE;
            }if(!is_null($request->HARGA_JASA))
            {
                $pegawai->HARGA_JASA=$request->HARGA_JASA;
            }
            $success=$pegawai->save();

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
            $pegawai=pegawai::find($id);
            $pegawai->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('service not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}