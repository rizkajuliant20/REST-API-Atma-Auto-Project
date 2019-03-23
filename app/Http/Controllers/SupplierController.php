<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\supplier;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Supplier_Transformer;

class SupplierController extends RestController
{
    protected $transformer = Supplier_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = supplier::all();
        return response()->json($supplier,200);
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
            'NAMA_SUPPLIER' => 'required',
            'ALAMAT_SUPPLIER' => 'required',
            'TELEPON_SUPPLIER' => 'required',
            'NAMA_SALES' => 'required',
            'TELEPON_SALES' => 'required'
        ]); 

        try{
            $supplier = new supplier;
            $supplier->NAMA_SUPPLIER=$request->NAMA_SUPPLIER;
            $supplier->ALAMAT_SUPPLIER=$request->ALAMAT_SUPPLIER;
            $supplier->TELEPON_SUPPLIER=$request->TELEPON_SUPPLIER;
            $supplier->NAMA_SALES=$request->NAMA_SALES;
            $supplier->TELEPON_SALES=$request->TELEPON_SALES;
            $supplier->save();
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
            $supplier=supplier::find($id);
            $response = $this->generateItem($supplier);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Supplier is not found');
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
                'NAMA_SUPPLIER' => 'required',
                'ALAMAT_SUPPLIER' => 'required',
                'TELEPON_SUPPLIER' => 'required',
                'NAMA_SALES' => 'required',
                'TELEPON_SALES' => 'required'
            ]); 

            $supplier=supplier::find($id);

            $supplier->update([
                'NAMA_SUPPLIER' => $request->NAMA_SUPPLIER,
                'ALAMAT_SUPPLIER' => $request->ALAMAT_SUPPLIER,
                'TELEPON_SUPPLIER' => $request->TELEPON_SUPPLIER,
                'NAMA_SALES' => $request->NAMA_SALES,
                'TELEPON_SALES' => $request->TELEPON_SALES,
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Supplier not found!');
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
            $supplier=supplier::find($id);
            $supplier->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Supplier not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}