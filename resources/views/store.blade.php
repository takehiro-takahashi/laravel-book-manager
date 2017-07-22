@extends('layouts.app')

@section('content')
    <h3>新しく本を追加する</h3>
    <div class="panel-body">
        @include('common.errors')

        <form action="{{ url('create') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="book" class="control-label">書籍名</label>
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="item_number" class="control-label">冊数</label>
                    <input type="text" name="item_number" id="book-number" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="item_amount" class="control-label">金額</label>
                    <input type="text" name="item_amount" id="book-amount" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="published" class="control-label">公開日</label>
                    <input type="datetime" name="published" id="book-published" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection