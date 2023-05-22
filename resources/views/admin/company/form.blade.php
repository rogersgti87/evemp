@extends('layouts.admin')

@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url($link)}}">{{ $title }}</a></li>
              <li class="breadcrumb-item active">{{Request::get('act') == 'add' ? $breadcrumb_new : $breadcrumb_edit}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <ul class="button-action">
                    <li><a href="#" data-original-title="Salvar" data-toggle="tooltip" class="btn btn-secondary" id="btn-salvar"><i class="fa fa-save fa-2x"></i></a></li>
                </ul>
            </div>

    <form class="form">

        <div class="col-md-12">
        <div class="form-row">

                    <div class="col-md-3 col-sm-12">
                    <fieldset>
                        <legend>Logotipo</legend>

                        <div class="form-group col-md-12 col-sm-12 text-center">
                            <a class="btn btn-default" style="border:1px solid #333;" id="lfm" data-input="thumbnail" data-preview="holder" style="cursor: pointer">
                                <img src="{{ isset($data->image_thumb) && $data->image_thumb != null ? url("$data->image_thumb") : url('assets/admin/img/thumb.png') }}" id="holder" style="height: 100px;width: 100px;">
                            </a>
                            <input type="hidden" id="thumbnail" name="image" value="{{ isset($data->image) ? $data->image : '' }}">
                        </div>

                    </fieldset>

                    </div>

                    <div class="col-md-12">

                    <fieldset>
                        <legend>Informações da Empresa</legend>
                        <div class="form-row">

                    <div class="form-group col-md-4 col-sm-12">
                        <label>Membro</label>
                        <select class="form-control custom-select" name="user_id" id="user_id">
                            @if(\Auth::user()->type == 'Membro' && \Auth::user()->id == $user->id)
                                <option {{ isset($data->user_id) && $data->user_id === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @else
                            @foreach($users as $user)
                                    <option {{ isset($data->user_id) && $data->user_id === $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-sm-12">
                        <label>Categoria</label>
                        <select class="form-control select2bs4" name="categories[]" multiple="multiple" id="categories" style="width:100%">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" selected>{{ $category->category }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>CNPJ/CPF</label>
                        <input type="text" class="form-control" name="document" id="cnpjcpf" autocomplete="off" required value="{{isset($data->document) ? $data->document : ''}}">
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Status</label>
                        <select class="form-control custom-select" name="status" id="status" {{ \Auth::user()->type == 'Membro' ? 'disabled' : ''}}>
                            <option {{ isset($data->status) === 1 ? 'selected' : '' }} value="1">Ativo</option>
                            <option {{ isset($data->status) === 0 ? 'selected' : '' }} value="0">Inativo</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label>Nome da Empresa</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required value="{{isset($data->name) ? $data->name : ''}}">
                    </div>


                        <div class="form-group col-md-3 col-sm-12">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" autocomplete="off" required value="{{isset($data->telephone) ? $data->telephone : ''}}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" autocomplete="off" required value="{{isset($data->whatsapp) ? $data->whatsapp : ''}}">
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" autocomplete="off" required value="{{isset($data->email) ? $data->email : ''}}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="instagram" autocomplete="off" required value="{{isset($data->instagram) ? $data->instagram : ''}}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook" autocomplete="off" required value="{{isset($data->facebook) ? $data->facebook : ''}}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Youtube</label>
                            <input type="text" class="form-control" name="youtube" id="youtube" autocomplete="off" required value="{{isset($data->youtube) ? $data->youtube : ''}}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Site</label>
                            <input type="text" class="form-control" name="site" id="site" autocomplete="off" required value="{{isset($data->site) ? $data->site : ''}}">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Google Maps</label>
                            <textarea class="form-control" name="google_maps" id="google_maps" autocomplete="off" rows="3">{{isset($data->google_maps) ? $data->google_maps : ''}}</textarea>
                        </div>



                        <div class="form-group col-md-12 col-sm-12">
                            <label>Descrição da Empresa</label>
                            <textarea class="form-control my-editor" name="description" id="content" rows="25">
                                {!! isset($data->description) ? $data->description : '' !!}
                            </textarea>
                        </div>

                        </div>

                    </fieldset>


                </div>



        </div>

        </div>

    </form>

        </div>
    </div>


</div>
</div>
</div>
  </div>
 </div>

@section('scripts')

<script>

$(document).ready(function () {

    $('#lfm').filemanager('image');

    tinymce.init(editor_config);

});

    $('#categories').select2({
        theme: 'bootstrap4',
        placeholder: "Selecione a Categoria...",
        allowClear: true,
        //minimumInputLength: 2,
        language: 'pt-BR',
        ajax: {
            url: '{{url("admin/category/getcategories")}}',
            dataType: 'json',

            data: function(params){
                return {
                    category: params.term,
                }
            },

            processResults: function (data) {
                return {
                    results:  data.map(function (category) {
                        return {
                            text: category.name,
                            id: category.id
                        };
                    })
                };
            },
            cache: true
        }

    });


    //Save data
        $(document).on('click', '#btn-salvar', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });
            tinymce.triggerSave();
            var url_act = "{{Request::get('act')}}";
            if(url_act == 'edit'){
                var url = "{{ url($linkUpdate) }}";
                var method = 'PUT';
            }else{
                var url = "{{ url("$linkStore") }}";
                var method = 'POST';
            }
            var data = $('.form').serialize();
            $.ajax({
                url: url,
                data:data,
                method:method,
                success:function(data){
                    Swal.fire({
                        width:350,
                        title: "<h5 style='color:#007bff'>" + data + "</h5>",
                        icon: 'success',
                        showConfirmButton: false,
                        showClass: {
                            popup: 'animate__animated animate__backInUp'
                        },
                        allowOutsideClick: false,
                        html:
                        '<a href="{{url($linkFormAdd)}}"  class="btn btn-secondary btn-md"> <i class="fa fa-plus"></i> Novo</a>  ' +
                        `<a href="{{url($linkFormEdit)}}" class="btn btn-success btn-md" style="${url_act == 'add' ? 'display:none;' : ''}"> <i class="fa fa-plus"></i> Editar</a>  ` +
                        '<a href="{{url($link)}}" data-original-title="Listar" data-toggle="tooltip" class="btn btn-primary btn-md"> <i class="fa fa-list"></i> Listar</a>',
                    });
                },
                error:function (xhr) {

                    if(xhr.status === 422){
                        Swal.fire({
                            text: xhr.responseJSON,
                            width:300,
                            icon: 'warning',
                            color: '#007bff',
                            confirmButtonColor: "#007bff",
                            showClass: {
                                popup: 'animate__animated animate__wobble'
                            }
                        });
                    } else{
                        Swal.fire({
                            text: xhr.responseJSON,
                            width:300,
                            icon: 'error',
                            color: '#007bff',
                            confirmButtonColor: "#007bff",
                            showClass: {
                                popup: 'animate__animated animate__wobble'
                            }
                        });
                    }


                }
            });



        });


    </script>




@endsection


@endsection
