@extends('layouts.admin')
@section('content')

    <div class="panel">
        <div class="panel-menu p12 admin-form theme-primary">
            <div class="row">
                <div class="col-md-5">
                    <label class="field select">
                        <select id="filter-category" name="filter-category">
                            <option value="0">Filter by Category</option>
                            <option value="1">Smart Phones</option>
                            <option value="2">Smart Watches</option>
                            <option value="3">Notebooks</option>
                            <option value="4">Desktops</option>
                            <option value="5">Music Players</option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
                <div class="col-md-5">
                    <label class="field select">
                        <select id="filter-status" name="filter-status">
                            <option value="0">Filter by Status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                            <option value="3">Low Stock</option>
                            <option value="4">Out of Stock</option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
                <div class="col-md-2">
                    <label class="field select">
                        <select id="bulk-action" name="bulk-action">
                            <option value="0">Actions</option>
                            <option value="1">Edit</option>
                            <option value="2">Delete</option>
                            <option value="3">Active</option>
                            <option value="4">Inactive</option>
                        </select>
                        <i class="arrow double"></i>
                    </label>
                </div>
            </div>
        </div>
        <div class="panel-body pn">
            <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                <thead>
                <tr class="bg-light">
                    <th class="">Sale Code</th>
                    <th class="">Kullanıcı</th>
                    <th class="">Fiyat</th>
                    <th class="">Status</th>
                    <th class="text-right">Status</th>

                </tr>
                </thead>
                <tbody>

              @foreach($orders as $item)
                <tr>
                    <td class="">{{$item->sales_code}}</td>
                    <td class="">{{$item->name}}</td>
                    <td class="">#{{number_format($item->total_price,'2',',','.')}}</td>
                    <td class="">{{$item->name == 0 ? 'Pasif' : 'Aktif'}}</td>
                    <td class="text-right">
                        @if ($item->status == 1)
                        Onaylandı
                        @else
                            <a href="#" onclick="verifyOrder({{$item->id}})">Siparişi Onayla</a>
                            @endif
                    </td>
                </tr>
              @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>

    @endsection
@section('css')
@endsection
@section('js')
    <script>

        function verifyOrder(id) {
            swal({
                title: 'Dikkat',
                text: 'Bu Sipariş Onaylanacak?',
                type: 'danger',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Onayla!'
            }).then(function () {
                $.ajax({
                    url: "/admin/orders/" + id,
                    type: 'get',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        swal({
                            title: 'Onaylandı',
                            text: 'Sipariş Onaylandı',
                            type: 'success'
                        })
                        location.reload();
                    },
                    error: function (response) {
                        swal({
                            title: 'İşlem Yapılamadı',
                            text: 'Sipariş Onaylanırken Hata Oluştu',
                            type: 'error'
                        })
                    }
                });
            })
        }
    </script>
@endsection

