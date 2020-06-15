@extends('layouts.site')

@section('content')
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    <h2>Teslimat Adresleri</h2>
    @if (count($deliveryAddress) < 1)
        <div class="alert alert-danger">
            Kayıtlı Adres bulunamadı. Lütfen Adres Ekleyiniz.
        </div>
    @endif

    @foreach($deliveryAddress as $deliveryAddres)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$deliveryAddres->name}}</h5>
            <p class="card-text">{{$deliveryAddres->address}}</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                   Seç
                </label>
            </div>

        </div>
    </div>
    @endforeach
    <button class="btn btn-default" data-toggle="modal" data-target="#addressModal"><i
            class="fa fa-plus" aria-hidden="true"></i>&nbsp;Yeni ekle
    </button>
    <hr>
    @if (count($deliveryAddress)>0)
        <form action="/payment" method="post" id="paymentForm">
            {{csrf_field()}}
            <input type="hidden" name="deliveryAddress" value="{{$deliveryAddress[0]->id}}">
            <button type="submit" class="btn btn-success">Kapıda Ödeme Seç </button>
        </form>
    @else
    Siparişi Tamamlamak  için lütfen adres seçiniz....
    @endif
{{--    //yeni fatura ekleme modal--}}
    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Yeni Adres Ekle</strong></h4>
                </div>
                <form action="#" id="addDeliveryForm" name="addDeliveryForm" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                            {{csrf_field()}}

                        <div class="form-group">
                            <label for="">Adres Adı</label>
                            <input type="text" name="name" class="form-control">
                            <em for="newname" class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>
                        <div class="form-group">
                            <label for="">Telefon</label>
                            <input type="text" name="mobile_number" class="form-control">
                            <em for="newmobile_number" class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>

                        <div class="form-group">
                            <label for="">TC Kimlik No</label>
                            <input type="text" name="idno" class="form-control">
                            <em for="newidno" class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>
                        <div class="form-group">
                            <label for="">Şehir</label>
                            <select name="city" id="" class="form-control">
                                <option value="1">İstanbul</option>
                                <option value="2">İzmir</option>
                            </select>
                            <em for="newcity" class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>
                        <div class="form-group">
                            <label for="">Semt</label>
                            <select name="district" id="" class="form-control">
                                <option value="1">Bağcılar</option>
                                <option value="2">Menemen</option>
                            </select>
                            <em for="newdistrict" class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>
                        <div class="form-group">
                            <label for="">Adres</label>
                            <textarea type="text" name="address"
                                      class="form-control"></textarea>
                            <em for="newaddress" class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" name="fatura_adresi"
                                   value="1">
                            <label for="inlineCheckbox1">Fatura adresim olsun.</label>

                            <em for="newfatura_adresi"
                                class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox2"
                                   name="teslimat_adresi" value="1">
                            <label for="inlineCheckbox2">Teslimat adresim olsun.</label>
                            <em for="newteslimat_adresi"
                                class="field prepend-icon state-error"
                                style="color: red;"></em>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Kapat
                        </button>
                        <button type="submit" name="button" class="btn btn-success">Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('js')
    <script type="text/javascript">

        //Yeni Fırsat Ekleme Formu
        $('#addDeliveryForm').submit(function (e) {
            $(this).find('em').text('');
            e.preventDefault(); //default olarak form değerlerini devre dışı bırak aşağıdaki işlemi çalıştır.
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: "/me/address",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    swal({
                        title: 'Adres Eklendi',
                        type: 'success'
                    }).then(function () {
                        location.href = '/basket/checkout1';
                    })
                },
                error: function (res) {
                    var response = res.responseJSON;

                    var fields = [
                        'name',
                        'mobile_number',
                        'idno',
                        'city',
                        'district',
                        'address',
                    ];
                    for (var i in fields) {
                        if (response.errors[fields[i]] && response.errors[fields[i]])
                            $("em[for=new" + fields[i] + "]").text(response.errors[fields[i]]);
                    }

                }
            });

        });
    </script>

@endsection
@endsection
