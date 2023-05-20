<div class="container">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Configurações Gerais</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Design</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Responsividade</a>
        </div>
    </nav>
    <form class="form-module-modal">
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="form-row">

                    <input type="hidden" name="psm_id" value="{{ $result->id }}">

                        <div class="form-group col-md-4 col-sm-12">
                            <label>Título</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ isset($psms['title']) ? $psms['title'] : '' }}">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label>Categoria</label>
                            <select class="form-control select2bs4" name="category_id" id="categories" style="width:100%">
                                @if(isset($category))
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @endif
                            </select>
                        </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Coluna</label>
                        <select class="form-control" name="orderbyfield">
                            <option {{ $result->orderbyfield == 'id' ? 'selected' : ''}} value="id">ID</option>
                            <option {{ $result->orderbyfield == 'name' ? 'selected' : ''}} value="name">Nome</option>
                            <option {{ $result->orderbyfield == 'date' ? 'selected' : ''}} value="date">Data</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-12">
                        <label>Ordernar</label>
                        <select class="form-control" name="orderby">
                            <option {{ $result->orderby == 'asc' ? 'selected' : ''}} value="asc">Crescente</option>
                            <option {{ $result->orderby == 'desc' ? 'selected' : ''}} value="desc">Decrescente</option>
                        </select>
                    </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Registros</label>
                            <input type="number" min="1" class="form-control" name="registers" id="registers" value="{{ $result->registers }}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Offset</label>
                            <input type="number" min="0" class="form-control" name="offset" id="offset" value="{{ $result->offset }}">
                        </div>

                        <div class="form-group col-md-3 col-sm-12">
                            <label>Paginação</label>
                            <select class="form-control" name="pagination">
                                <option {{ $result->pagination == 0 ? 'selected' : ''}} value="none">Não</option>
                                <option {{ $result->pagination == 'normal' ? 'selected' : ''}} value="normal">Normal</option>
                                <option {{ $result->pagination == 'infinity' ? 'selected' : ''}} value="infinity">Infinito</option>
                            </select>
                        </div>

                </div>
            </div>
            <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="form-row">

                        <div class="form-group col-md-3 col-sm-12 my-colorpicker">
                            <label>Cor Titulo</label>
                            <input type="text" class="form-control" onchange="colorPicker(this)" autocomplete="off" name="title_color" id="title_color" value="{{ $result->title_color }}">
{{--                            <div class="input-group-append">--}}
{{--                                <span class="input-group-text"><i class="fas fa-square"></i></span>--}}
{{--                              </div>--}}
                        </div>

                        <div class="form-group col-md-3 col-sm-12 my-colorpicker">
                            <label>Cor fundo Título</label>
                            <input type="text" class="form-control" autocomplete="off" name="title_background_color" id="title_background_color" value="{{ $result->title_background_color }}">
{{--                            <div class="input-group-append">--}}
{{--                                <span class="input-group-text"><i class="fas fa-square"></i></span>--}}
{{--                              </div>--}}
                        </div>


                        <div class="form-group col-md-3 col-sm-12 my-colorpicker">
                            <label>Cor de fundo</label>
                            <input type="text" class="form-control" autocomplete="off" name="background_color" id="background_color" value="{{ $result->background_color }}">
{{--                            <div class="input-group-append">--}}
{{--                                <span class="input-group-text"><i class="fas fa-square"></i></span>--}}
{{--                              </div>--}}
                        </div>


                    <div class="form-group col-md-12 col-sm-12 text-center mt-2">
                        <fieldset>
                            <legend>Imagem de Fundo</legend>
                            <div class="form-group col-md-12 col-sm-12 text-center">
                                <a class="btn btn-default" style="border:1px solid #333;" id="lfm-background-image" data-input="background-image-thumbnail" data-preview="background-image-holder" style="cursor: pointer">
                                    <img src="{{ isset($data->background_image_thumb) && $data->background_image_thumb != null ? url("$data->background_image_thumb") : url('assets/admin/img/thumb.png') }}" id="background-image-holder" style="height: 100px;width: 100px;">
                                </a>
                                <input type="hidden" id="background-image-thumbnail" name="background_image" value="{{ isset($data->background_image) ? $data->background_image : '' }}">
                            </div>
                            <button class="btn-danger" onclick="removeBackgroundImage();" type="button"><i class="fa fa-trash"></i> </button>
                        </fieldset>
                    </div>


                    <div class="form-group col-md-6 col-sm-12">
                        <label>Elemento ID</label>
                        <input type="text" class="form-control" name="element_id" id="element_id" autocomplete="off" value="{{ $result->element_id }}">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label>Classes CSS</label>
                        <input type="text" class="form-control" name="class" id="class" autocomplete="off" value="{{ $result->class }}">
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label>CSS Personalizado</label>
                        <textarea class="form-control" rows="5" name="custom_css" id="custom_css">{{ $result->custom_css }}</textarea>
                    </div>


                </div>
            </div>
            <div class="tab-pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="form-row">

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Colunas (Desktop)<i class="fa fa-desktop"></i></label>
                        <select class="form-control" name="column_lg">
                            <option {{ $result->column_lg == 'col-lg-12' ? 'selected' : ''}} value="col-lg-12">12 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-11' ? 'selected' : ''}} value="col-lg-11">11 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-10' ? 'selected' : ''}} value="col-lg-10">10 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-9' ? 'selected' : ''}} value="col-lg-9">9 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-8' ? 'selected' : ''}} value="col-lg-8">8 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-7' ? 'selected' : ''}} value="col-lg-7">7 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-6' ? 'selected' : ''}} value="col-lg-6">6 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-5' ? 'selected' : ''}} value="col-lg-5">5 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-4' ? 'selected' : ''}} value="col-lg-4">4 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-3' ? 'selected' : ''}} value="col-lg-3">3 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-2'  ? 'selected' : ''}} value="col-lg-2">2 Colunas</option>
                            <option {{ $result->column_lg == 'col-lg-1'  ? 'selected' : ''}} value="col-lg-1">1 Coluna</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Ocultar (Desktop)<i class="fa fa-eye-slash"></i></label>
                        <select class="form-control" name="column_lg_hide">
                            <option {{ $result->column_lg_hide == 'd-lg-block' ? 'selected' : ''}} value="d-lg-block">Não</option>
                            <option {{ $result->column_lg_hide == 'd-lg-none' ? 'selected' : ''}}  value="d-lg-none">Sim</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Colunas (Tablet)<i class="fa fa-tablet-alt"></i></label>
                        <select class="form-control" name="column_md">
                            <option {{ $result->column_md == 'col-md-12' ? 'selected' : ''}} value="col-md-12">12 Colunas</option>
                            <option {{ $result->column_md == 'col-md-11' ? 'selected' : ''}} value="col-md-11">11 Colunas</option>
                            <option {{ $result->column_md == 'col-md-10' ? 'selected' : ''}} value="col-md-10">10 Colunas</option>
                            <option {{ $result->column_md == 'col-md-9' ? 'selected' : ''}} value="col-md-9">9 Colunas</option>
                            <option {{ $result->column_md == 'col-md-8' ? 'selected' : ''}} value="col-md-8">8 Colunas</option>
                            <option {{ $result->column_md == 'col-md-7' ? 'selected' : ''}} value="col-md-7">7 Colunas</option>
                            <option {{ $result->column_md == 'col-md-6' ? 'selected' : ''}} value="col-md-6">6 Colunas</option>
                            <option {{ $result->column_md == 'col-md-5' ? 'selected' : ''}} value="col-md-5">5 Colunas</option>
                            <option {{ $result->column_md == 'col-md-4' ? 'selected' : ''}} value="col-md-4">4 Colunas</option>
                            <option {{ $result->column_md == 'col-md-3' ? 'selected' : ''}} value="col-md-3">3 Colunas</option>
                            <option {{ $result->column_md == 'col-md-2'  ? 'selected' : ''}} value="col-md-2">2 Colunas</option>
                            <option {{ $result->column_md == 'col-md-1'  ? 'selected' : ''}} value="col-md-1">1 Coluna</option>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-12">
                        <label>Ocultar (Tablet)<i class="fa fa-eye-slash"></i></label>
                        <select class="form-control" name="column_md_hide">
                            <option {{ $result->column_md_hide == 'd-md-block' ? 'selected' : ''}} value="d-md-block">Não</option>
                            <option {{ $result->column_md_hide == 'd-md-none' ? 'selected' : ''}} value="d-md-none">Sim</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Colunas (Celular)<i class="fa fa-mobile-alt"></i></label>
                        <select class="form-control" name="column_sm">
                            <option {{ $result->column_sm == 'col-sm-12' ? 'selected' : ''}} value="col-sm-12">12 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-11' ? 'selected' : ''}} value="col-sm-11">11 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-10' ? 'selected' : ''}} value="col-sm-10">10 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-9' ? 'selected' : ''}} value="col-sm-9">9 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-8' ? 'selected' : ''}} value="col-sm-8">8 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-7' ? 'selected' : ''}} value="col-sm-7">7 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-6' ? 'selected' : ''}} value="col-sm-6">6 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-5' ? 'selected' : ''}} value="col-sm-5">5 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-4' ? 'selected' : ''}} value="col-sm-4">4 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-3' ? 'selected' : ''}} value="col-sm-3">3 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-2'  ? 'selected' : ''}} value="col-sm-2">2 Colunas</option>
                            <option {{ $result->column_sm == 'col-sm-1'  ? 'selected' : ''}} value="col-sm-1">1 Coluna</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Ocultar (Celular)<i class="fa fa-eye-slash"></i></label>
                        <select class="form-control" name="column_sm_hide">
                            <option {{ $result->column_sm_hide == 'd-sm-block' ? 'selected' : ''}} value="d-sm-block">Não</option>
                            <option {{ $result->column_sm_hide == 'd-sm-none' ? 'selected' : ''}} value="d-sm-none">Sim</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Colunas (outros)<i class="far fa-window-restore"></i></label>
                        <select class="form-control" name="column_xs">
                            <option {{ $result->column_xs == 'col-xs-12' ? 'selected' : ''}} value="col-xs-12">12 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-11' ? 'selected' : ''}} value="col-xs-11">11 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-10' ? 'selected' : ''}} value="col-xs-10">10 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-9' ? 'selected' : ''}} value="col-xs-9">9 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-8' ? 'selected' : ''}} value="col-xs-8">8 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-7' ? 'selected' : ''}} value="col-xs-7">7 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-6' ? 'selected' : ''}} value="col-xs-6">6 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-5' ? 'selected' : ''}} value="col-xs-5">5 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-4' ? 'selected' : ''}} value="col-xs-4">4 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-3' ? 'selected' : ''}} value="col-xs-3">3 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-2'  ? 'selected' : ''}} value="col-xs-2">2 Colunas</option>
                            <option {{ $result->column_xs == 'col-xs-1'  ? 'selected' : ''}} value="col-xs-1">1 Coluna</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-12">
                        <label>Ocultar (outros)<i class="fa fa-eye-slash"></i></label>
                        <select class="form-control" name="column_xs_hide">
                            <option {{ $result->column_xs_hide == 'd-xs-block' ? 'selected' : ''}} value="d-xs-block">Não</option>
                            <option {{ $result->column_xs_hide == 'd-xs-none' ? 'selected' : ''}} value="d-xs-none">Sim</option>
                        </select>
                    </div>


                </div>
            </div>

        </div>
    </form>

</div>

<script>

    $(document).ready(function () {
        $('#lfm-background-image').filemanager('image');
    });

    $('#categories').select2({
        theme: 'bootstrap4',
        placeholder: "Selecione a Categoria...",
        allowClear: true,
        minimumInputLength: 2,
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


    function removeBackgroundImage(){
        $("#background-image-thumbnail").val('');
        $("#background-image-holder").attr('src','{{url('assets/admin/img/thumb.png')}}');
    }



    //color picker with addon
    $('.my-colorpicker').colorpicker();
    // function colorPicker(id){
    //     $('.my-colorpicker-'+id).on('colorpickerChange', function(event) {
    //   $('.my-colorpicker-'+id+' .fa-square').css('color', event.color.toString());
    // });
    // }




</script>
