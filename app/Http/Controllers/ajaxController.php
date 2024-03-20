<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ajaxController extends Controller
{

    public function process (Request $request, $modelname) {

             $action = $request->action;
            if($action == 'add') {
                $store = $this->store($request, $modelname);
                 return response()->json($store);

            } else if($action == 'draft' || $action == 'activate' || $action == 'delete') {
              $upstatus =  $this->toStatus($request, $modelname);
              return response()->json($upstatus);
            } else if($action == 'getcats') {
                $cats = Category::find($request->id);
                return response()->json($cats);
            } else if($action == 'edit') {
                $edit =  $this->edit($request, $modelname);
                return response()->json($edit);
            } else {
                return response()->json(['m' => 'Undefine', 's' => 0]);
            }
    }


    public function store(Request $request, $modelname) {
        $s = 0;
        $m = "ghgh";
        if($modelname === 'category') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string'
            ]);

            if ($validator->fails()) {
                $m =  $validator->errors()->first();
            } else {
                try {
                    $category = new Category();
                    $category->name = $request->name;
                    $category->status = $request->has('status') ? 1 : 0;
                    $category->save();
                    $s = 1;
                    $m = "Category Successfully added";
                } catch (QueryException $e) {
                    $m = 'Database error: ' . $e->getMessage();
                }
            
            }

            
        } else if($modelname === 'product') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
                'category' => 'required',
                'description' => 'required',
            ]);

            if($validator->fails()) {
                $m = $validator->errors()->first();
            } else {
                
                try {
                    $medicine = new Product();
                    $medicine->name = $request->name;
                    $medicine->quantity = $request->quantity;
                    $medicine->price = $request->price;
                    $medicine->cat_id = $request->category;
                    $medicine->description = $request->description;
                    $medicine->status = $request->has('status') ? 1 :0;
                    $medicine->save();
                    $s = 1;
                    $m = "You successfully Add new Medicine";
                } catch(QueryException $e) {
                    $m = "Error ".$e->getMessage();
                }
            }
        }

        return ['m' => $m, 's' => $s];
       
    }

    public function toStatus(Request $request, $modelname) {
        $action = $request->action;
        $id = $request->id;
        $s =0;
        $m = "";
        $mm = ucfirst($modelname);
        $className = "App\\Models\\$mm";
        $modelClass = new $className;
        $model = $modelClass->find($id);

        if(!$model) {
            $m = "Item not found";
        } else {
            switch($action) {
                case 'draft':
                   
                    try {
                        $model->status = 0;
                        $model->save();
                        $s = 1;
                        $m = "Item successfully moved to draft";
                    } catch(QueryException $e) {
                        $m = "Error ".$e->getMessage();
                    }
                    break;
                case 'activate':
                    try {
                        $model->status = 1;
                        $model->save();
                        $s = 1;
                        $m = "Item successfully Activated";
                    } catch(QueryException $e) {
                        $m = "Error ".$e->getMessage();
                    }
                    break;
                case 'delete':
                    try {
                        $model->delete();
                        $s = 1;
                        $m = "Item successfully deteled";
                    } catch(QueryException $e) {
                        $m = "Error ".$e->getMessage();
                    }
                    break;
                default: 
                    $m = "Undefined Action";
                    break;
            }
        }

        return ['s' => $s, 'm' => $m];


       
    }

    public function edit($request, $modelname) {
       $s = 0;
       $m = "";

       $mm = ucfirst($modelname);
       $className = "App\\Models\\$mm";
       $modelClass = new $className;
       $model = $modelClass->find($request->id);

       if($modelname == 'category') {
        $status = $request->has('status') ? 1 : 0;
        
        try {
            $model->name = $request->name;
            $model->status = $status;
            $model->save();
            $s = 1;
            $m = "category successfully updated";
        } catch(QueryException $e) {
            $m = "Error :".$e->getMessage();
        }

       } else if($modelname == 'product') {

        $status = $request->has('status') ? 1 : 0;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'category' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            $m = $validator->errors()->first();
        } else {
            try {
                $model->name = $request->name;
                $model->price = $request->price;
                $model->quantity = $request->quantity;
                $model->description = $request->description;
                $model->cat_id = $request->category;
                $model->status = $status;
                $model->save();
                $s = 1;
                $m = "Successfully updated";
            } catch(QueryException $e) {
                $m = "Error ".$e->getMessage();
            }
        }

       } else {
        $m = "Undefined";
       }

       return ['s' => $s, 'm' => $m];
    }
}
 