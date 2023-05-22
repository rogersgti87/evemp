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
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

                    @if(Request::get('id'))
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <legend>Galeria de Fotos</legend>

                            <div class="card-body">
                                <div id="actions" class="row">
                                  <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                      <span class="btn btn-success col fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Selecionar Fotos</span>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 d-flex align-items-center">
                                    <div class="fileupload-process w-100">
                                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="table table-striped files" id="previews">
                                  <div id="template" class="row mt-2">
                                    <div class="col-auto">
                                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                    </div>
                                    <div class="col d-flex align-items-center">
                                        <p class="mb-0">
                                          <span class="lead" data-dz-name></span>
                                          (<span data-dz-size></span>)
                                        </p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>

                                  </div>
                                </div>


                                  <!-- Show images -->
                                    <div class="form-group col-md-12 col-sm-12 mt-5">
                                        <fieldset>
                                            <div class="row" id="load-images" style="height: 300px;overflow-y: scroll;"></div>
                                        </fieldset>
                                    </div>
                                <!-- fim Show images -->
                              </div>
                              <!-- /.card-body -->

                        </fieldset>

                        </div>

                        @endif

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

    @if(Request::get('id'))
        loadImages();
    @endif

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




 // DropzoneJS Demo Code Start
 Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var urlUpload  = "{{ url('admin/companies/images/') }}";
var company_id = "{{ Request::get('id') }}";

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
  url: urlUpload+'/'+company_id, // Set the url
  thumbnailWidth: 80,
  thumbnailHeight: 80,
  parallelUploads: 20,
  previewTemplate: previewTemplate,
  autoQueue: true, // Make sure the files aren't queued until manually added
  previewsContainer: "#previews", // Define the container to display the previews
  clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  init: function() {
		this.on('success', function(){
			if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
     				loadImages();
			}
	    });
	},
    queuecomplete: function () {
        this.removeAllFiles();
    }

});


function loadImages(){

    var urlUpload  = "{{ url('admin/companies/images/') }}";
    var company_id = "{{ Request::get('id') }}";

    $.ajax({
        url: urlUpload+'/'+company_id,
        method:'GET',
        success:function(data){
            console.log(data);

        $('#load-images').html('');

    var html = '';
    if(data.length > 0){
        $.each(data, function(i, item) {

        html += '<div class="col-md-2 p-2 text-center">';
        html += `<img src="{{ url('${item.image}')}}" id="${item.id}" style="width:120px;height:120px;pointer-events: none;" class="img-thumbnail mb-1">`;
        html += `<a href="#" onclick="removeImage(${item.id})" class="btn btn-sm btn-danger" style="width:100px;"><i class="fas fa-trash"></i></a>`;
        html += '</div>';

    });
    }else{
        html += '<div class="col-12 text-center">Nenhuma imagem foi enviada ainda.</div>';
    }

    $('#load-images').append(html);


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

}


function removeImage(id){

    var urlUpload  = "{{ url('admin/companies/images/') }}";

    Swal.fire({
    title: 'Deseja remover esta imagem?',
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
            url: urlUpload+'/'+id,
            method:'DELETE',
            success:function(data){
                loadImages();
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



}


</script>




@endsection


@endsection
