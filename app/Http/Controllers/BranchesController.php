<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\branches;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Branches_Transformer;

class BranchesController extends RestController
{
    protected $transformer = Branches_Transformer::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branches::all();
        return response()->json($branches,200);
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
    //'ID_CABANG','NAMA_branches','ALAMAT_branches','TELEPON_branches','GAJI_branches','USERNAME','PASSWORD','ROLE'
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'NAMA_CABANG' => 'required',
            'ALAMAT_CABANG' => 'required',
            'TELEPON_CABANG' => 'required'
        ]); 

        try{
            $branches = new branches;
            $branches->NAMA_CABANG=$request->NAMA_CABANG;
            $branches->ALAMAT_CABANG=$request->ALAMAT_CABANG;
            $branches->TELEPON_CABANG=$request->TELEPON_CABANG;
            $success=$branches->save();

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
            $branches=branches::find($id);
            $response = $this->generateItem($branches);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('branch not found!',500);
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
            $branches=branches::find($id);
            if(!is_null($request->NAMA_CABANG)){
                $branches->NAMA_CABANG=$request->NAMA_CABANG;
            }if(!is_null($request->ALAMAT_CABANG))
            {
                $branches->ALAMAT_CABANG=$request->ALAMAT_CABANG;
            }if(!is_null($request->TELEPON_CABANG))
            {
                $branches->TELEPON_CABANG=$request->TELEPON_CABANG;
            }
            $success=$branches->save();

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
            $branches=branches::find($id);
            $branches->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('service not found!');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}