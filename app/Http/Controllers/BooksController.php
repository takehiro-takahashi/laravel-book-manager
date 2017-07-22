<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // トップ画面
    public function home()
    {
        $books = Book::orderBy('created_at', 'asc')->paginate(3);
        return view('home', [
            'data' => $books,
        ]);
    }

    // 詳細画面
    public function description()
    {
        return view('description');
    }

    // 新本追加画面
    public function store()
    {
        $this->middleware('auth');
        return view('store');
    }

    // 新本追加処理
    public function create(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:3|max:50',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published' => 'required',
        ]);

        // バリデーション：エラー
        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        // 登録処理
        $book = new Book;
        $book->item_name = $request->item_name;
        $book->item_number = $request->item_number;
        $book->item_amount = $request->item_amount;
        $book->published = $request->published;
        $book->save();

        return redirect('/');
    }

    // 更新画面
    public function edit($book_id)
    {
        $book = Book::find($book_id);
        return view('edit', [
            'data' => $book,
        ]);
    }

    // 更新処理
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:2|max:50',
            'item_number' => 'required|min:1|max:5',
            'item_amount' => 'required|max:8',
            'published' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        // データ登録
        $book = Book::find($request->id);
        $book->item_name = $request->item_name;
        $book->item_number = $request->item_number;
        $book->item_amount = $request->item_amount;
        $book->published = $request->published;
        $book->save();
        return redirect('/');
    }

    // 削除処理
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
