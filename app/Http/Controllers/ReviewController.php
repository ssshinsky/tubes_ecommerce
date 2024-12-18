<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller{
    public function index(){
        $review = Review::with(['transaksi', 'user'])->inRandomOrder()->get();

        return response([
            'message' => 'All Reviews Retrieved!',
            'data' => $review
        ], 200);
    }

    public function show(string $id){
        $review = Review::findOrFail($id);

        return response([
            'message' => 'Review Found!',
            'data' => $review
        ], 200);
    }

    public function store(Request $request){
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'id_transaksi' => 'required|exists:transaksi,id',
            'rating' => 'required|numeric|between:1,5',
            'isi' => 'required',
            'tanggal_review' => 'required|date',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }
        
        $user = Auth::user();
        if(!$user){
            return response(['message' => 'User Not Found!'], 404);
        }
        $storeData['id_user'] = $user->id;

        $review = Review::create($storeData);

        return response([
            'message' => 'Review Added Successfully!',
            'data' => $review,
        ], 201);
    }

    public function update(Request $request, string $id){
        $review = Review::findOrFail($id);

        $updateData = $request->all();
        
        $validate = Validator::make($updateData, [
            'id_transaksi' => 'required|exists:transaksi,id',
            'rating' => 'required|numeric|between:1,5',
            'isi' => 'required',
            'tanggal_review' => 'required|date',
        ]);
        if($validate->fails()){
            return response(['message' => $validate->errors()], 400);
        }

        $review->update($updateData);

        return response([
            'message' => 'Review Updated Successfully!',
            'data' => $review,
        ], 200);
    }

    public function destroy(string $id){
        $review = Review::findOrFail($id);
        
        if($review->delete()){
            return response([
                'message' => 'Review Deleted Successfully!',
                'data' => $review,
            ], 204);
        }

        return response([
            'message' => 'Delete Review Failed!',
            'data' => null,
        ], 400);
    }
}