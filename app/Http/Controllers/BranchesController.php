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
        $response = $this->generateCollection($branches);
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
            'NAMA_CABANG' => 'required',
            'ALAMAT_CABANG' => 'required',
            'TELEPON_CABANG' => 'required',
        ]);   
        try {
                $branches = new branches;
                $branches->NAMA_CABANG=$request->get('NAMA_CABANG');
                $branches->ALAMAT_CABANG=$request->get('ALAMAT_CABANG');
                $branches->TELEPON_CABANG=$request->get('TELEPON_CABANG');
                $branches->save();
                $response = $this->generateItem($branches);
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
            $branch=branches::find($id);
            $response = $this->generateItem($branch);
            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('CABANG TIDAK ADA');
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
        try {
            $branch=branches::find($id);
            $branch->NAMA_CABANG=$request->get('NAMA_CABANG');
            $branch->ALAMAT_CABANG=$request->get('ALAMAT_CABANG');
            $branch->TELEPON_CABANG=$request->get('TELEPON_CABANG');
            $branch->save();
            $response = $this->generateItem($branch);
            return $this->sendResponse($response, 201);
        }catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('CABANG TIDAK ADA');
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
            $branch=branches::find($id);
            $branch->delete();
            return response()->json('Success',200);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('CABANG TIDAK ADA');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}