@extends('layouts.app')

@section('content')
    @if(count($data) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                本一覧(<a href="/store">新規登録</a>)
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                    <th>書籍名</th>
                    <th>冊数</th>
                    <th>金額</th>
                    <th>公開日</th>
                    <th>更新ボタン</th>
                    <th>削除ボタン</th>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                    @foreach ($data as $book)
                        <tr>
                            <!-- 本タイトル -->
                            <td class="table-text">
                                <div>{{ $book->item_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $book->item_number }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $book->item_amount }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $book->published }}</div>
                            </td>
                            <!-- 本: 更新ボタン -->
                            <td>
                                <form action="{{ url('edit/'.$book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-trash"></span> 更新
                                    </button>
                                </form>
                            </td>

                            <!-- 本: 削除ボタン -->
                            <td>
                                <form action="{{ url('delete/'.$book->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span> 削除
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
