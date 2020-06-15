@extends('layouts.site')

@section('content')
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Ürün Adı</th>
            <th style="width:10%">Fiyat</th>
            <th style="width:8%">Adet</th>
            <th style="width:22%" class="text-center">Ara Toplam</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(count($baskets) > 0)
            @foreach($baskets as $id => $basket)

                @php $total += $basket->price * $basket->amount @endphp

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="/{{ $basket->product_image }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$basket->product_name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">₺{{ $basket->price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $basket->amount }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">₺{{ $basket->price * $basket->amount }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{$basket->id}}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{$basket->id}}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Alışverişe Devam Et</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ₺{{ $total }}</strong></td>
            <td><a href="{{ route('checkout1') }}" class="btn btn-success"><i class="fa fa-angle-right"></i> Siparişi Tamamla</a></td>
        </tr>
        </tfoot>
    </table>
@section('js')
    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '/basket/update',
                method: "post",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                     window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Silmek İstediğinize Eminmisiniz.")) {
                $.ajax({
                    url: '/basket/remove',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.replace('/basket/cart');
                    }
                });
            }
        });

    </script>

@endsection
@endsection
