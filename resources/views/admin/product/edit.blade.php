@extends('layouts.admin')
@section('content')
    <section id="content" class="table-responsive">
        <div class="admin-form theme-primary">

            <div id="p1" class="panel heading-border panel-primary">

                <div class="panel-body bg-light">
                    <form action="#" id="editProductForm" name="editProductForm" method="post"
                          enctype="multipart/form-data">
                        <div class="section-divider mb40" id="spy1">
                            <span>Ürün Güncelleme Formu</span>
                        </div>
                        <!-- .section-divider -->
                    {{csrf_field()}}

                    <!-- Multi Selects -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="section">
                                    <div class="section"><label for="username" class="field-label">Ürün Adı</label>
                                        <label class="field">
                                            <input type="text" name="product_name" id="from" value="{{$data->product_name}}"  class="gui-input"
                                                   placeholder="Ürün Adını Giriniz" maxlength="40"><span style="font-size: 11px;"> </span>
                                        </label>
                                        <em for="newproduct_name" class="field prepend-icon state-error"
                                            style="color: red;"></em>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section">
                                    <div class="section"><label for="username" class="field-label">Ürün Kodu</label>
                                        <label class="field">
                                            <input type="text" name="product_code" id="from"  value="{{$data->product_code}}" class="gui-input"
                                                   placeholder="Ürün Kodu" maxlength="40"><span style="font-size: 11px;"> </span>
                                        </label>
                                        <em for="newproduct_code" class="field prepend-icon state-error"
                                            style="color: red;"></em>
                                    </div>
                                </div>
                            </div>




                              <div class="col-md-2">
                                <div class="section"><label for="username" class="field-label">Ücreti</label>
                                    <label class="field">
                                        <input type="text" name="price"  value="{{$data->price}}"  class="gui-input sayikontrol"
                                               placeholder="Ücreti"><span style="font-size: 11px;"> </span>
                                    </label>
                                    <em for="newprice" class="field prepend-icon state-error"
                                        style="color: red;"></em>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="section"><label for="stock" class="field-label">Stok Ekle</label>
                                    <label class="field">
                                        <input type="text" name="stock" id="from"  value="{{$data->stock}}" class="gui-input sayikontrol"
                                               placeholder="0">
                                    </label>
                                    <em for="newstock" class="field prepend-icon state-error"
                                        style="color: red;"></em>
                                </div>
                            </div>
                </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="section"><label for="urun_resim" class="field-label">Ürün Resmi
                                        Ekle</label>
                                    <label class="field">
                                        <input type="file" name="product_image2" class="gui-input">
                                    </label>
                                    <input type="hidden" name="product_image"  value="{{$data->product_image}}">
                                    <em for="newproduct_image2" class="field prepend-icon state-error"
                                        style="color: red;"></em>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="section"><label for="product_description" class="field-label">Ürün Açıklama </label>
                                    <label class="field">
                                                <textarea type="text" name="product_description"
                                                          class="gui-textarea ckeditor"
                                                          placeholder="Açıklama"> {{$data->product_description}} </textarea>
                                    </label>
                                    <em for="newproduct_description" class="field prepend-icon state-error"
                                        style="color: red;"></em>

                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="button btn-primary">Ürün Güncelle</button>
                            <button type="reset" class="button"> Temizle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

    @endsection
@section('css')
@endsection
@section('js')
    <script>
        //Ürün Güncelleme Formu
        $('#editProductForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $(this).find('em').text('');
            // formData.append('ucret_count', $(this).find('.ucret_row').length);
            $.ajax({
                url: "/admin/product/update",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    swal({
                        title: 'Tebrikler İşlem Başarılı',
                        text: 'Ürün Güncellendi.',
                        type: 'success'
                    }).then(function () {
                        window.location.reload();
                    })
                },
                error: function (res) {
                    var response = res.responseJSON;
//                    console.log(response.errors);
                    var fields = [
                        'product_name',
                        'product_code',
                        'stock',
                        'price',
                    ];
                    for (var i in fields) {
                        if (response.errors[fields[i]] && response.errors[fields[i]][0])
                            $("em[for=new" + fields[i] + "]").text(response.errors[fields[i]][0]);
                    }
                }
            });

        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("keypress", ".sayikontrol", function (e) {
            var _allowed_keys = [9];
            if (_allowed_keys.indexOf(e.which) === -1) {
                var pressedKey = String.fromCharCode(e.which);
                var allowedCharacters = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ','];
                if ($.inArray(pressedKey, allowedCharacters) === -1)
                    return false;
                //nokta yada virgül varsa yada ilk karakter olarak girilmek istenmişse => return false;
                var current_val = $(this).val();
                if (['.', ','].indexOf(pressedKey) > -1)
                    if (current_val === '' || current_val.indexOf('.') > -1 || current_val.indexOf(',') > -1)
                        return false;
            }
        });
    </script>
@endsection
