<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sparepart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Sparepart_Transformer;
class SparepartController extends RestController
{
    protected $transformer = Sparepart_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = sparepart::all();
        $response = $this->generateCollection($sparepart);
        return $this->sendResponse($response);
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
            'KODE_PENEMPATAN' => 'required',
            'NAMA_SPAREPART' => 'required',
            'HARGA_BELI' => 'required',
            'HARGA_JUAL' => 'required',
            'STOK_MINIMAL' => 'required',
            'STOK_BARANG' => 'required',
            'GAMBAR' => 'required',
            'TIPE' => 'required',
        ]);   

        try {
            $sparepart = new sparepart;

            if($request->hasfile('GAMBAR'))
            {
                $file = $request->file('GAMBAR');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/GAMBAR/', $name);
                $sparepart->GAMBAR=$name;
            }
            else{
                $sparepart->GAMBAR=NULL;
            }
            $sparepart->ID_SPAREPARTS=$request->get('ID_SPAREPARTS');
            $sparepart->KODE_PENEMPATAN=$request->get('KODE_PENEMPATAN');
            $sparepart->NAMA_SPAREPART=$request->get('NAMA_SPAREPART');
            $sparepart->HARGA_BELI=$request->get('HARGA_BELI');
            $sparepart->HARGA_JUAL=$request->get('HARGA_JUAL');
            $sparepart->STOK_MINIMAL=$request->get('STOK_MINIMAL');
            $sparepart->STOK_BARANG=$request->get('STOK_BARANG');
            $sparepart->TIPE=$request->get('TIPE');
            $sparepart->save();
            $response = $this->generateItem($sparepart);
            return $this->sendResponse($response, 200);
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
            $sparepart=sparepart::find($id);
            $response = $this->generateItem($sparepart);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Sparepart is not found');
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
        $this->validate($request,[
            'ID_SPAREPARTS' => 'required',
            'KODE_PENEMPATAN' => 'required',
            'NAMA_SPAREPART' => 'required',
            'HARGA_BELI' => 'required',
            'HARGA_JUAL' => 'required',
            'STOK_MINIMAL' => 'required',
            'STOK_BARANG' => 'required',
            'GAMBAR' => 'required',
            'TIPE' => 'required',
        ]); 

        try {
            $sparepart=sparepart::find($id);

            if($request->hasfile('GAMBAR'))
            {
                $file = $request->file('GAMBAR');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/GAMBAR/', $name);
                $sparepart->GAMBAR=$name;
            }
            else{
                $sparepart->GAMBAR=NULL;
            }
            $sparepart->save();
            
            $sparepart->update([
                'ID_SPAREPARTS'=>$request->get('ID_SPAREPARTS'),
                'KODE_PENEMPATAN'=>$request->get('KODE_PENEMPATAN'),
                'NAMA_SPAREPART'=>$request->get('NAMA_SPAREPART'),
                'HARGA_BELI'=>$request->get('HARGA_BELI'),
                'HARGA_JUAL'=>$request->get('HARGA_JUAL'),
                'STOK_MINIMAL'=>$request->get('STOK_MINIMAL'),
                'STOK_BARANG'=>$request->get('STOK_BARANG'),
                'TIPE'=>$request->get('TIPE'),
            ]);
            return response()->json('Success', 200);
        }catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Sparepart is not found');
        }catch (\Exception $e) {
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
            $sparepart=sparepart::find($id);
            $sparepart->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Sparepart is not found');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}