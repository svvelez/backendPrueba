<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{

    public function index()
    {
        $books = Books::all();
        return response()->json(['books' => $books]);
    }

    public function createBook(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => true,'message' => 'El campo no puede ir vacío']);
            }

            $book = Books::create([
                'name' => $request->input('name')
            ]);

            return response()->json(['success' => 'true']);
    
    }

    public function deleteBook(Request $request){
        $book = Books::find($request->id)->delete();
        return response()->json(['success' => 'true']);
    }

    public function getBook(Request $request){
        $book = Books::find($request->id);
        return response()->json(['book' => $book ]);
    }

    public function editBook(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error' => true,'message' => 'El campo no puede ir vacío']);
            }

            $book = Books::find($request->id);
            $book->update([
                'name' => $request->name
            ]);
            return response()->json(['success' => 'true']);
    }


}
