<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendapatan;
use Illuminate\Support\Facades\Validator;

class PendapatanController extends Controller{
    public function index(){
        $pendapatan = Pendapatan::with(['pemesanan'])->inRandomOrder()->get();

        return response([
            'message' => 'All Incomes Retrieved!',
            'data' => $pendapatan
        ], 200);
    }

    public function show(string $id){
        $pendapatan = Pendapatan::findOrFail($id);

        return response([
            'message' => 'Income Found!',
            'data' => $pendapatan
        ], 200);
    }

    public function store(Request $request){
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'id_pemesanan' => 'required|exists:pemesanan,id',
            'total_pendapatan' => 'required|numeric',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $pendapatan = Pendapatan::create($storeData);

        return response([
            'message' => 'Income Added Successfully!',
            'data' => $pendapatan,
        ], 201);
    }

    public function update(Request $request, string $id){
        $pendapatan = Pendapatan::findOrFail($id);

        $updateData = $request->all();
        
        $validate = Validator::make($updateData, [
            'id_pemesanan' => 'required|exists:pemesanan,id',
            'total_pendapatan' => 'required|numeric',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $pendapatan->update($updateData);

        return response([
            'message' => 'Income Updated Successfully!',
            'data' => $pendapatan,
        ], 200);
    }

    public function destroy(string $id){
        $pendapatan = Pendapatan::findOrFail($id);
        
        if($pendapatan->delete()){
            return response([
                'message' => 'Income Deleted Successfully!',
                'data' => $pendapatan,
            ], 204);
        }

        return response([
            'message' => 'Delete Income Failed!',
            'data' => null,
        ], 400);
    }
}