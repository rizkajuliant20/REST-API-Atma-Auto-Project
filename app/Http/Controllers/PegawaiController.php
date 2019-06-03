<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pegawai;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\Pegawai_Transformer;
use Illuminate\Support\Facades\Hash;

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
    
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'NAMA_PEGAWAI' => 'required',
            'ALAMAT_PEGAWAI' => 'required',
            'TELEPON_PEGAWAI' => 'required',
            'GAJI_PEGAWAI' => 'required',
            'ID_CABANG' => 'required',
            'ROLE' => 'required',
        ]); 

        $data = [
            'NAMA_PEGAWAI' => $request->NAMA_PEGAWAI,
            'ALAMAT_PEGAWAI'=>$request->ALAMAT_PEGAWAI,
            'TELEPON_PEGAWAI'=>$request->TELEPON_PEGAWAI,
            'GAJI_PEGAWAI'=>$request->GAJI_PEGAWAI,
            'ID_CABANG' => $request->ID_CABANG,
            'ROLE'=>$request->ROLE
        ];

        $nama=$request->NAMA_PEGAWAI;
        $role=$request->ROLE;
        $count = user::get()->count()+1;

        try{
            $pegawai = DB::transaction(function () use ($data, $nama, $count, $role) {
                $user = user::create([
                    'username' => $role . '-' . $nama . '-' . $count,
                    'password' => bcrypt($role . '-' . $nama . '-' . $count ),
                ]);
                return $user->pegawai()->create($data);
            });
            
            $success=$pegawai->save();
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
            $pegawai=pegawai::find($id);
            $response = $this->generateItem($pegawai);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Employee is not found!',500);
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
                'NAMA_PEGAWAI' => 'required',
                'ALAMAT_PEGAWAI' => 'required',
                'TELEPON_PEGAWAI' => 'required',
                'GAJI_PEGAWAI' => 'required',
                'ID_CABANG' => 'required',
                'ROLE' => 'required'
            ]); 

            $pegawai=pegawai::find($id);

            $pegawai->update([
                'NAMA_PEGAWAI' => $request->NAMA_PEGAWAI,
                'ALAMAT_PEGAWAI'=>$request->ALAMAT_PEGAWAI,
                'TELEPON_PEGAWAI'=>$request->TELEPON_PEGAWAI,
                'GAJI_PEGAWAI'=>$request->GAJI_PEGAWAI,
                'ID_CABANG' => $request->ID_CABANG,
                'ROLE'=>$request->ROLE
            ]);
            return response()->json('Success', 200);
        }catch(ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Employee is not found!',500);
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
            $pegawai=pegawai::find($id);
            $pegawai->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('Employee is not found!');
        } catch (\Exception $e) {
            throw $e;
            return $this->sendIseResponse($e->getMessage());
        }
    }
}