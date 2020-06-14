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
                    <th class="">Resim</th>
                    <th class="">Ürün Adı</th>
                    <th class="">Ürün Kodu</th>
                    <th class="">Fiyat</th>
                    <th class="">Stok</th>
                    <th class="text-right">Status</th>

                </tr>
                </thead>
                <tbody>

              @foreach($data as $item)
                <tr>

                    <td class="w100">
                        <img class="img-responsive mw40 ib mr10" title="user" src="{{$item->product_image}}">
                    </td>
                    <td class="">{{$item->product_name}}</td>
                    <td class="">{{$item->product_code}}</td>
                    <td class="">#{{number_format($item->price,'2',',','.')}}</td>
                    <td class="">{{$item->stock}}</td>
                    <td class="text-right">
                        <div class="btn-group text-right">
                            <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active
                                <span class="caret ml5"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/admin/product/edit/{{$item->id}}">Edit</a>
                                </li>
                                <li>
                                    <a href="#" onclick="deleteProduct({{$item->id}})">Delete</a>
                                </li>

                            </ul>
                        </div>
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

        function deleteProduct(id,rid) {
            swal({
                title: 'Lütfen Dikkat',
                text: 'Bu Ürünün Silinmesini Onaylıyor musunuz?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil!'
            }).then(function () {
                $.ajax({
                    url: "/admin/product/delete/" + id,
                    type: 'get',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        swal({
                            title: 'Ürün Silindi',
                            text: 'Silme işlemi Tamamlandı',
                            type: 'success'
                        })
                        location.reload();
                    },
                    error: function (response) {
                        swal({
                            title: 'İşlem Yapılamadı',
                            text: 'Ürün Silinirken Hata Oluştu',
                            type: 'error'
                        })
                    }
                });
            })
        }
    </script>
@endsection

