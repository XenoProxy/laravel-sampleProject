@extends('layouts.app')

@section('content')

<!-- <script src="{{ asset('js/AddLike.js') }}"></script> -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div id="isLiked" style="display:none;"></div>
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
        </div> 

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Reviews:</strong>
            @foreach($comments as $comment)
            <div class="form-group" id="comments">
                <p>Mark   :{{ $comment['mark'] }}</p>
                <p>Comment:{{ $comment['text'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mark:</strong>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                <input type="text" id="review_mark" name="mark">
                <strong>Text:</strong>
                <input type="text" id="review_text" name="text">
                <button id="send_review">Add a review</button>
            </div>
            <div id="comments"></div>
        </div>  
    </div>     
@endsection