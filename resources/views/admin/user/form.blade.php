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
                        <legend>Foto</legend>

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
                        <legend>Informações do Usuário</legend>

                    <div class="form-row">

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Tipo de Usuário</label>
                        <select class="form-control custom-select" name="type" id="type" {{ \Auth::user()->type == 'Membro' ? 'disabled' : ''}}>
                            <option {{ isset($data->type) && $data->type === 'Usuario' ? 'selected' : '' }} value="Usuario">Usuário</option>
                            <option {{ isset($data->type) && $data->type === 'Membro' ? 'selected' : '' }} value="Membro">Membro</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Status</label>
                        <select class="form-control custom-select" name="status" id="status" {{ \Auth::user()->type == 'Membro' ? 'disabled' : ''}}>
                            <option {{ isset($data->status) && $data->status === 1 ? 'selected' : '' }} value="1">Ativo</option>
                            <option {{ isset($data->status) && $data->status === 0 ? 'selected' : '' }} value="0">Inativo</option>
                        </select>
                    </div>

                    <div class="form-group col-md-8 col-sm-12">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required value="{{isset($data->name) ? $data->name : ''}}">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" autocomplete="off" required value="{{isset($data->email) ? $data->email : ''}}">
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" required value="">
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Confirme a senha</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="off" required value="">
                    </div>

                        <div class="form-group col-md-2 col-sm-12">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" autocomplete="off" required value="{{isset($data->telephone) ? $data->telephone : ''}}">
                        </div>

                        <div class="form-group col-md-2 col-sm-12">
                            <label>Whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" autocomplete="off" required value="{{isset($data->whatsapp) ? $data->whatsapp : ''}}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Ministério</label>
                            <select class="form-control custom-select" name="ministry_id" id="ministry_id">
                                @foreach($ministries as $ministry)
                                    <option {{ isset($data->ministry_id) === $ministry->id ? 'selected' : '' }} value="{{ $ministry->id }}">{{ $ministry->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Profissão</label>
                            <input type="text" class="form-control" name="profession" id="profession" autocomplete="off" required value="{{isset($data->profession) ? $data->profession : ''}}">
                        </div>

                        <div class="form-group col-md-2 col-sm-12">
                            <label>Desempregado?</label>
                            <select class="form-control custom-select" name="work_state" id="work_state">
                                <option {{ isset($data->work_state) && $data->work_state === 'Não' ? 'selected' : '' }} value="Não">Não</option>
                                <option {{ isset($data->work_state) && $data->work_state === 'Sim' ? 'selected' : '' }} value="Sim">Sim</option>
                            </select>
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

    $('#lfm').filemanager('image');

    //Save data
        $(document).on('click', '#btn-salvar', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });
            var url_act = "{{Request::get('act')}}";
            if(url_act == 'edit'){
                var url = "{{ url("$linkUpdate") }}";
                var method = 'PUT';
            }else{
                var url = "{{ url("$linkStore") }}";
                var method = 'POST';
            }

            var data = $('.form').serialize();
            console.log(url);

            $.ajax({
                url: url,
                data:data,
                method:method,
                success:function(data){
                    console.log(data);
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
                        '<a href="{{url($linkFormAdd)}}" data-original-title="Novo" data-toggle="tooltip" class="btn btn-secondary btn-md"> <i class="fa fa-plus"></i> Novo</a>  ' +
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
