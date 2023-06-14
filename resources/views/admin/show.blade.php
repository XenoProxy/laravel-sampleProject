@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/AddReview.js') }}"></script>
    <script src="{{ asset('js/AddLike.js') }}"></script>
    <div class="row">
        <div class="col-lg-5 margin-tb">
            <div id="isLiked" style="display:none;"></div>
            <div class="pull-left">
                <h2> Product`s likes statistic</h2>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Likes</th>
                    </tr>
                    <tr>
                        @foreach($product as $v)
                        <td>{{$v}}</td>
                        @endforeach
                    </tr>
                </table>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">

    </div>
@endsection