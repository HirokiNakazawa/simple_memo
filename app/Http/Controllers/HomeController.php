<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Memo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //メモデータを取得
        $memos = Memo::select('memos.*')->where('user_id', '=', \Auth::id())
                    ->whereNull('deleted_at')->orderBy('updated_at', 'DESC')->get();
        dd($memos);
        return view('create');
    }

    public function store (Request $request) {
        $posts = $request->all();
        //dd -> データ確認
        Memo::insert(['content' => $posts['content'], 'user_id' => \Auth::id()]);
        return redirect(route('home'));
    }
}
