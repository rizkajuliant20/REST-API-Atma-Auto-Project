<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\montir_onduty;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Montir_Onduty_Transformer;

class MontirOnDutyController extends Controller
{
    protected $transformer = Montir_Onduty_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $montir_onduty = montir_onduty::all();
        return response()->json($montir_onduty,200);
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
            'ID_PEGAWAI' => 'required',
            'ID_KENDARAAN_PEL' => 'required'
        ]); 

        try{
            $montir_onduty = new montir_onduty;
            $montir_onduty->ID_PEGAWAI=$request->ID_PEGAWAI;
            $montir_onduty->ID_KENDARAAN_PEL=$request->ID_KENDARAAN_PEL;
            $montir_onduty->save();
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
            $montir_onduty=montir_onduty::find($id);
            $response = $this->generateItem($montir_onduty);
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
                'ID_PEGAWAI' => 'required',
                'ID_KENDARAAN_PEL' => 'required'
            ]); 

            $montir_onduty=montir_onduty::find($id);

            $montir_onduty->update([
                'ID_PEGAWAI'=>$request->ID_PEGAWAI,          
                'ID_KENDARAAN_PEL'=>$request->ID_KENDARAAN_PEL
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
            $montir_onduty=montir_onduty::find($id);
            $montir_onduty->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Duty is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
