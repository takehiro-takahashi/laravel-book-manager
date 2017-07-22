@extends('layouts.app')

@section('content')
    @include('common.errors')
    <form action="{{ url('update') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-sm-6">
                <label for="book" class="control-label">書籍名</label>
                <input type="text" name="item_name" id="book-name" class="form-control" value="{{ $data->item_name }}">
            </div>

            <div class="col-sm-6">
                <label for="item_number" class="control-label">冊数</label>
                <input type="text" name="item_number" id="book-number" class="form-control" value="{{ $data->item_number }}">
            </div>

            <div class="col-sm-6">
                <label for="item_amount" class="control-label">金額</label>
                <input type="text" name="item_amount" id="book-amount" class="form-control" value="{{ $data->item_amount }}">
            </div>

            <div class="col-sm-6">
                <label for="published" class="control-label">公開日</label>
                <input type="datetime" name="published" id="book-published" class="form-control" value="{{ $data->published }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Save
                </button>
            </div>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
    </form>
@endsection