@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規メモ作成</div>
        <form class="card-body" action="/store" method="post">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="content" rows="3" placeholder="ここにメモを入力"></textarea>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    </div>
@endsection