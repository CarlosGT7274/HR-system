<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SimpleCRUDController extends Controller
{
    /**
     * Instance of a Model Table
     * @var Model
     */
    private $tableModel;

    /**
     * Create a new controller instance.
     *
     * @param Model $model Model of the table for the instance of the class
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->tableModel = $model;

        $this->middleware('auth:api');
    }

    /**
     * Read All Data from a table with a possible extra param
     * 
     * @param array $extraParam Searching exra param ['column' => one column, 'value' => value of the param]
     * @param boolean $needEncode Bool flag for encode if is needed. 
     * @return array|string Information of All Matching Element
     */
    public function readAll($extraParam, $needEncode = false)
    {
        $data = [];

        if (count($extraParam) == 0) {
            $data = $this->tableModel::all();
        } else {
            $data = $this->tableModel->where($extraParam['column'], $extraParam['value'])->get();
        }

        if ($needEncode) {
            foreach ($data as $object) {
                $object["info"] = "base64," . base64_encode($object["info"]);
            }
        }

        return response()->json([
            'error' => false,
            'mensaje' => '',
            'data' => $data
        ], 200);
    }

    /**
     * Read a Specific row on the data base table
     *
     * @param integer $id Elemet id 
     * @param boolean $needEncode Bool flag for encode if is needed. 
     * @param array $extraParam Searching exra param ['column' => one column, 'value' => value of the param]
     * @return array|string Element Information
     */
    public function readOne($id, $extraParam, $needEncode = false)
    {
        $data = [];

        if (count($extraParam) == 0) {
            $data = $this->tableModel::find($id);
        } else {
            $data = $this->tableModel::where($extraParam['column'], $extraParam['value'])->find($id);
        }

        if (empty($data)) {
            return response()->json([
                'error' => true,
                'mensaje' => 'Registro Inexistente'
            ], 404);
        }

        if ($needEncode) {
            $data["info"] = "base64," . base64_encode($data["info"]);
        }

        return response()->json([
            'error' => false,
            'mensaje' => '',
            'data' => $data
        ], 200);
    }

    /**
     * Create an new Object on the data base table
     * 
     * @param Request $request JSON of the Request Boy
     * @param array $extraInfo Extra Info for the Element
     * @param array $varlidationRules Validation Rules for the Request
     * @return boolean
     */
    public function create($request, $extraInfo, $validationRules, $needDecode = false)
    {
        $request->validate($validationRules);

        if (count($extraInfo) > 0) {
            foreach ($extraInfo as $key => $value) {
                $request[$key] = $value;
            }
        }

        if ($needDecode) {
            $request["info"] = base64_decode($request["info"]);
        }

        $object = $this->tableModel::create($request->all());

        if ($needDecode) {
            $object["info"] = "base64," . base64_encode($object["info"]);
        }

        return response()->json([
            'error' => false,
            'mensaje' => '',
            'data' => $object
        ], 201);
    }

    /**
     * Update an object on the data base table
     * 
     * @param int $id Elemet id 
     * @param Request $request JSON of the Request Boy
     * @param array $varlidationRules Validation Rules for the Request
     * @param boolean $needEncode Bool flag for encode if is needed. 
     * @return boolean If the Update was succesfull
     */
    public function update($id, $request, $validationRules, $needDecode = false)
    {
        $object = $this->tableModel::find($id);

        if (empty($object)) {
            return response()->json([
                'error' => true,
                'mensaje' => 'Registro Inexistente'
            ], 404);
        }

        $request->validate($validationRules);

        if ($needDecode) {
            $request["info"] = base64_decode($request["info"]);
        }

        echo (base64_encode($request["info"]));

        return response()->json([
            'error' => $object->update($request->all()) ? false : true,
            'mensaje' => 'Cambios Realizados'
        ], 200);
    }

    /**
     * Delete a specific object on the data base table.
     * 
     * @param int $id Elemet id 
     * @return boolean If the Delete was succesfull
     */
    public function delete($id)
    {
        $object = $this->tableModel::find($id);

        if (empty($object)) {
            return response()->json([
                'error' => true,
                'mensaje' => 'Regitro Inexistente'
            ], 404);
        }

        try {
            $attempt =  $this->tableModel::destroy($id);
        } catch (\Throwable $th) {
            $attempt = false;
        }

        return response()->json([
            'error' => $attempt ? false : true,
            'mensaje' => $attempt ? 'Eliminado Correctamente' : 'No se puede borrar el registro'
        ], 200);
    }
}
