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

                    <div class="col-md-12">

                    <fieldset>
                        <legend>Informações da Página</legend>

                        <div class="form-row">

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Menu</label>
                        <select class="form-control select2bs4" name="menu_id" id="menu_id" style="width:100%">
                            @if(isset($menus))
                                @foreach($menus as $menu)
                                    <option {{ isset($data->menu_id) && $data->menu_id == $menu->id ? 'selected' : '' }} value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Cabeçalho Superior</label>
                        <select class="form-control select2bs4" name="header_top_id" id="header_top_id" style="width:100%">
                            <option value="0">Padrão</option>
                            @if(isset($header_top))
                                @foreach($header_top as $ht)
                                    <option {{ isset($data->header_top_id) && $data->header_top_id == $ht->id ? 'selected' : '' }} value="{{ $ht->id }}">{{ $ht->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Cabeçalho</label>
                        <select class="form-control select2bs4" name="header_id" id="header_id" style="width:100%">
                            <option value="0">Padrão</option>
                            @if(isset($headers))
                                @foreach($headers as $header)
                                    <option {{ isset($data->header_id) && $data->header_id == $header->id ? 'selected' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Rodapé</label>
                        <select class="form-control select2bs4" name="footer_id" id="footer_id" style="width:100%">
                            <option value="0">Padrão</option>
                            @if(isset($footers))
                                @foreach($footers as $footer)
                                    <option {{ isset($data->footer_id) && $data->footer_id == $footer->id ? 'selected' : '' }} value="{{ $footer->id }}">{{ $footer->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Layout</label>
                        <select class="form-control custom-select" name="layout" id="layout">
                            <option {{ isset($data->layout) === 'default' ? 'selected' : '' }} value="default">Padrão</option>
                            <option {{ isset($data->layout) === 'sidebar' ? 'selected' : '' }} value="sidebar">Barra Lateral</option>
                            <option {{ isset($data->layout) === 'full' ? 'selected' : '' }} value="full">Largura Total</option>
                        </select>
                    </div>


                    <div class="form-group col-md-6 col-sm-12">
                        <label>Título</label>
                        <input type="text" class="form-control" name="title" id="title" autocomplete="off" required value="{{isset($data->title) ? $data->title : ''}}">
                    </div>



                    <div class="form-group col-md-2 col-sm-12">
                        <label>Exibir Título</label>
                        <select class="form-control custom-select" name="show_title" id="show_title">
                            <option {{ isset($data->show_title) === 1 ? 'selected' : '' }} value="1">Sim</option>
                            <option {{ isset($data->show_title) === 0 ? 'selected' : '' }} value="0">Não</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Cor do Título</label>
                        <input type="text" class="form-control my-colorpicker" name="color_title" id="color_title" autocomplete="off" required value="{{isset($data->color_title) ? $data->color_title : ''}}">
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Alinhar Título</label>
                        <select class="form-control custom-select" name="align_title" id="align_title">
                            <option {{ isset($data->align_title) === 'text-left' ? 'selected' : '' }} value="text-left">Esquerda</option>
                            <option {{ isset($data->align_title) === 'text-center' ? 'selected' : '' }} value="text-center">Centro</option>
                            <option {{ isset($data->align_title) === 'text-right' ? 'selected' : '' }} value="text-right">Direita</option>
                            <option {{ isset($data->align_title) === 'text-justify' ? 'selected' : '' }} value="text-justify">Justificado</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Meta Descrição</label>
                        <textarea rows="4" class="form-control" name="meta_description" id="meta_description" autocomplete="off" required>{{isset($data->meta_description) ? $data->meta_description : ''}}</textarea>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Meta Palavras Chaves</label>
                        <textarea rows="4" class="form-control" name="meta_keywords" id="meta_keywords" autocomplete="off" required>{{isset($data->meta_keywords) ? $data->meta_keywords : ''}}</textarea>
                    </div>

                        </div>

                    </fieldset>


                </div>

        </div>

        </div>

    </form>


            <div class="row">
            <div class="col-md-7">

                        <div class="form-group col-md-4 col-sm-12 bg-gradient-white text-center" >
                            <fieldset>
                                <legend>Nova Seção</legend>
                                <div class="btn-group p-3" style="border:1px dashed #ccc;">
                                    <button type="button" id="add-section" class="btn btn-default"><i class="fa fa-1x fa-plus"></i></button>
                                </div>
                            </fieldset>
                        </div>

                <div class="col-md-12">
                    <div id="load-sections"></div>
                </div>
            </div>

            <div class="col-md-4">

            </div>

            </div>
        </div>
    </div>


</div>
</div>
</div>
  </div>
 </div>





@section('scripts')

<script>

    $(document).ready(function(){
      loadSections();
    });

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



    $(document).on('click', '#add-section', function (e) {
        $("#add-section").attr("disabled", true);
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });
        var url = "{{ url("$linkAddSection") }}";
        $.ajax({
            url: url,
            method: 'POST',
            success: function (data) {
                loadSections();
                $("#add-section").attr("disabled", false);
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

    function loadSections(){
            $.ajax({
                url: "{{ url($linkLoadSections) }}",
                method: 'get',
                beforeSend:null,
                success: function(data){
                    $('#load-sections').html(data);
                }
            });
    }


    $(document).on('click','.add-module-section',function(e){
        $(".add-module-section").attr("disabled", true);
        var section_id = this.getAttribute('data-section-id');
        var module_id  = this.id;
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });
        var url = "{{ url("$linkAddModuleSection") }}";
        $.ajax({
            url: url,
            data: {
                section_id:section_id,
                module_id: module_id
            },
            method: 'POST',
            success: function (data) {
                $('#modal-show-modules').modal('hide');
                $(".add-module-section").attr("disabled", false);
                loadSections();

            }
        });
    });



    $(document).on('click', '#save-section', function (e) {
        //$("#save-section").attr("disabled", true);
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        var data = $('.form-section').serialize();
        var url = "{{ url($linkSaveSection) }}";

        $.ajax({
            url: url,
            data: data,
            method: 'PUT',
            success: function (data) {
                //$("#modal-section").modal('hide');
                Swal.fire({
                    text: 'Registro salvo com sucesso!',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__backInUp'
                    },
                });
                //$("#save-section").attr("disabled", false);
            }
        });
    });


    $(document).on('click', '#save-form-module', function (e) {
        $("#save-form-module").attr("disabled", true);
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        var data = $('.form-module-modal').serialize();
        var url = "{{ url($linkSaveFormModule) }}";

        $.ajax({
            url: url,
            data: data,
            method: 'PUT',
            success: function (data) {
                $("#modal-section").modal('hide');
                Swal.fire({
                    text: 'Registro salvo com sucesso!',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__backInUp'
                    },
                });
                $("#save-form-module").attr("disabled", false);
            }
        });
    });


    $(document).on('click','.remove-section',function(e){
        var section_id = this.getAttribute('id');
        Swal.fire({
            title: 'Deseja remover este registro?',
            text: "Você não poderá reverter isso!",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });
                $.ajax({
                    url: "{{url($linkDestroySection)}}",
                    method: 'DELETE',
                    data: {
                        section_id:section_id,
                    },
                    success: function (data) {
                        loadSections();
                    },
                    error:function (xhr) {

                        if(xhr.status === 422){
                            Swal.fire({
                                text: xhr.responseJSON,
                                icon: 'warning',
                                showClass: {
                                    popup: 'animate__animated animate__wobble'
                                }
                            });
                        } else{
                            Swal.fire({
                                text: xhr.responseJSON,
                                icon: 'error',
                                showClass: {
                                    popup: 'animate__animated animate__wobble'
                                }
                            });
                        }


                    }
                });

            }
        });

    });


    $(document).on('click','.remove-module-section',function(e){
        var psm_id = this.getAttribute('id');
        console.log(psm_id);
        Swal.fire({
            title: 'Deseja remover este registro?',
            text: "Você não poderá reverter isso!",
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    }
                });
                $.ajax({
                    url: "{{url($linkDestroyModuleSection)}}",
                    method: 'DELETE',
                    data: {
                        psm_id:psm_id,
                    },
                    success: function (data) {
                        loadSections();
                    },
                    error:function (xhr) {

                        if(xhr.status === 422){
                            Swal.fire({
                                text: xhr.responseJSON,
                                icon: 'warning',
                                showClass: {
                                    popup: 'animate__animated animate__wobble'
                                }
                            });
                        } else{
                            Swal.fire({
                                text: xhr.responseJSON,
                                icon: 'error',
                                showClass: {
                                    popup: 'animate__animated animate__wobble'
                                }
                            });
                        }


                    }
                });

            }
        });

    });



    $('.my-colorpicker').colorpicker();

</script>




@endsection


@endsection
