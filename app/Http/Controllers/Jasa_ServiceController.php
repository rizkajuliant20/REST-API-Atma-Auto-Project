<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jasa_service;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Jasa_Service_Transformer;

class Jasa_ServiceController extends RestController
{
    protected $transformer = Jasa_Service_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa_service = jasa_service::all();
        $response = $this->generateCollection($jasa_service);
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
            'NAMA_SERVICE' => 'required',
            'HARGA_JASA' => 'required',
        ]);   
        try {
                $jasa_service = new jasa_service;
                $jasa_service->NAMA_JASA=$request->get('NAMA_JASA');
                $jasa_service->HARGA_JASA=$request->get('HARGA_JASA');
                $jasa_service->save();
                $response = $this->generateItem($jasa_service);
                return $this->sendResponse($response, 201);
           
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
            $jasa_service=jasa_service::find($id);
            $response = $this->generateItem($jasa_service);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('JASA TIDAK ADA');
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
        $this->validate($request,[
            'NAMA_JASA' => 'required',
            'HARGA_JASA' => 'required',
        ]);
        
        try {
            $jasa_service=jasa_service::find($id);
            $jasa_service->NAMA_JASA=$request->get('NAMA_JASA');
            $jasa_service->HARGA_JASA=$request->get('HARGA_JASA');
            $jasa_service->save();
            $response = $this->generateItem($service);
            return $this->sendResponse($response, 201);
        }catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('JASA TIDAK ADA');
        }
        catch (\Exception $e) {
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
            $jasa_service=jasa_service::find($id);
            $jasa_service->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('JASA TIDAK ADA');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}