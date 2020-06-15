@extends('layouts.site')

@section('content')

    <div class="container products">
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif
        <div class="row">

            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="/{{ $product->product_image }}" width="500" height="300">
                        <div class="caption">
                            <h4>{{ $product->product_name }}</h4>
                            <p>{{ str_limit(strtolower($product->product_description), 50) }}</p>
                            <p><strong>Ücret: </strong> {{ $product->price }}$</p>
                            <p><center>Adet
                                    <form action="{{ route('add_basket') }}" method="POST">
                                        {{csrf_field()}}
                                        <input type="number" name="amount" id="amount" value="1">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <button type="submit" class="btn btn-warning btn-block text-center addBasket">Sepete Ekle</button>
                                    </form>
{{--                            <p class="btn-holder"><a href="#"  class="btn btn-warning btn-block text-center addBasket" role="button"></a> </p>--}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection
@section('js')

    @endsection
