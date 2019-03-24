<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pegawai_onduty;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Pegawai_Onduty_Transformer;

class PegawaiOnDutyController extends Controller
{
    protected $transformer = Pegawai_Onduty_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai_onduty = pegawai_onduty::all();
        return response()->json($pegawai_onduty,200);
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
            'ID_PEGAWAI' => 'required'
        ]); 

        try{
            $pegawai_onduty = new pegawai_onduty;
            $pegawai_onduty->ID_TRANSAKSI=$request->ID_TRANSAKSI;
            $pegawai_onduty->ID_PEGAWAI=$request->ID_PEGAWAI;
            $pegawai_onduty->save();
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
            $pegawai_onduty=pegawai_onduty::find($id);
            $response = $this->generateItem($pegawai_onduty);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Duty is not found');
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
                'ID_PEGAWAI' => 'required'
            ]); 

            $pegawai_onduty=pegawai_onduty::find($id);

            $pegawai_onduty->update([
                'ID_TRANSAKSI'=>$request->ID_TRANSAKSI,          
                'ID_PEGAWAI'=>$request->ID_PEGAWAI
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Duty is not found');
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
            $pegawai_onduty=pegawai_onduty::find($id);
            $pegawai_onduty->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Duty is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
