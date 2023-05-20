<div class="container">

    <form class="form-section">

        <div class="form-row">

            <input type="hidden" name="id" value="{{ $data->id}}">

{{--            <div class="form-group col-md-12 col-sm-12">--}}
{{--                <label>Largura Total (Full)</label>--}}
{{--                <select class="form-control" name="full_width">--}}
{{--                    <option {{ $data->full_width == '0' ? 'selected' : ''}} value="0">Não</option>--}}
{{--                    <option {{ $data->full_width == '1' ? 'selected' : ''}} value="1">Sim</option>--}}
{{--                </select>--}}
{{--            </div>--}}

            <div class="form-group col-md-12 mt-2">
                <fieldset>
                    <legend>Bordas (Shapes Dividers)</legend>

                    <div class="row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Estilo</label>
                            <select class="form-control" name="divider" id="divider">
                                <option {{ $data->divider == '0' ? 'selected' : ''}} value="0">Nenhum</option>
                                <option {{ $data->divider == '1' ? 'selected' : ''}} value="1">Estilo 1</option>
                                <option {{ $data->divider == '2' ? 'selected' : ''}} value="2">Estilo 2</option>
                                <option {{ $data->divider == '3' ? 'selected' : ''}} value="3">Estilo 3</option>
                                <option {{ $data->divider == '4' ? 'selected' : ''}} value="4">Estilo 4</option>
                                <option {{ $data->divider == '5' ? 'selected' : ''}} value="5">Estilo 5</option>
                                <option {{ $data->divider == '6' ? 'selected' : ''}} value="6">Estilo 6</option>
                                <option {{ $data->divider == '7' ? 'selected' : ''}} value="7">Estilo 7</option>
                                <option {{ $data->divider == '8' ? 'selected' : ''}} value="8">Estilo 8</option>
                                <option {{ $data->divider == '9' ? 'selected' : ''}} value="9">Estilo 9</option>
                                <option {{ $data->divider == '10' ? 'selected' : ''}} value="10">Estilo 10</option>
                                <option {{ $data->divider == '11' ? 'selected' : ''}} value="11">Estilo 11</option>
                                <option {{ $data->divider == '12' ? 'selected' : ''}} value="12">Estilo 12</option>
                                <option {{ $data->divider == '13' ? 'selected' : ''}} value="13">Estilo 13</option>
                                <option {{ $data->divider == '14' ? 'selected' : ''}} value="14">Estilo 14</option>
                                <option {{ $data->divider == '15' ? 'selected' : ''}} value="15">Estilo 15</option>
                                <option {{ $data->divider == '16' ? 'selected' : ''}} value="16">Estilo 16</option>
                                <option {{ $data->divider == '17' ? 'selected' : ''}} value="17">Estilo 17</option>
                                <option {{ $data->divider == '18' ? 'selected' : ''}} value="18">Estilo 18</option>
                                <option {{ $data->divider == '19' ? 'selected' : ''}} value="19">Estilo 19</option>
                                <option {{ $data->divider == '20' ? 'selected' : ''}} value="20">Estilo 20</option>
                            </select>
                            <label>Altura da Borda</label>
                            <input type="text" class="form-control" autocomplete="off" name="divider_height" value="{{ $data->divider_height }}">
                            <label>Rotacionar Borda</label>
                            <select class="form-control" name="divider_flip" id="divider_flip">
                                <option {{ $data->divider_flip == 'false' ? 'selected' : ''}} value="false">Não</option>
                                <option {{ $data->divider_flip == 'true' ? 'selected' : ''}} value="true">Sim</option>
                            </select>
                            <label>Escurecer fundo</label>
                            <select class="form-control" name="background_overlay" id="background_overlay">
                                <option {{ $data->background_overlay == 1 ? 'selected' : ''}} value="1">Sim</option>
                                <option {{ $data->background_overlay == 0 ? 'selected' : ''}} value="0">Não</option>
                            </select>
                        </div>

                        <div class="form-group col-md-9 col-sm-12">
                            <img src="{{ $data->divider != 0 ? url('img/shapes/'.$data->divider.'.png') : url('img/grid.jpg')}}" id="img-divider" style="height: 100px;width:100%;">
                        </div>

                    </div>
                </fieldset>
            </div>

            <div class="form-group col-md-12">
                <fieldset>
                    <legend>Espaçamento Interno (Padding). De: 1 - 150</legend>

                    <div class="row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Superior</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="pt" value="{{ $data->pt }}">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Direito</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="pr" value="{{ $data->pr }}">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Inferior</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="pb" value="{{ $data->pb }}">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Esquerdo</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="pl" value="{{ $data->pl }}">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="form-group col-md-12">
                <fieldset>
                    <legend>Espaçamento Externo (Margin). De: 1 - 150</legend>

                    <div class="row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Superior</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="mt" value="{{ $data->mt }}">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Direito</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="mr" value="{{ $data->mr }}">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Inferior</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="mb" value="{{ $data->mb }}">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label>Esquerdo</label>
                            <input type="number" min="0" max="150" class="form-control" autocomplete="off" name="ml" value="{{ $data->ml }}">
                        </div>
                    </div>
                </fieldset>
            </div>



            <fieldset>
                <legend>Fundo</legend>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>Tipo de Fundo</label>
                    <select class="form-control" name="background_type">
                        <option {{ $data->background_type == '' ? 'selected' : ''}} value="">Nenhum</option>
                        <option {{ $data->background_type == 'color' ? 'selected' : ''}} value="color">Cor</option>
                        <option {{ $data->background_type == 'image' ? 'selected' : ''}} value="image">Imagem</option>
                        <option {{ $data->background_type == 'parallax' ? 'selected' : ''}} value="parallax">Imagem Parallax</option>
                        <option {{ $data->background_type == 'video' ? 'selected' : ''}} value="video">Vídeo HTML5</option>
                    </select>
                </div>

            <div class="form-group col-md-6 col-sm-12">
                <label>Cor de fundo</label>
                <input type="text" class="form-control colorpicker-default" autocomplete="off" name="background_color" id="cor_fundo" value="{{ $data->background_color }}">
            </div>


                <div class="form-group col-md-6 col-sm-12 text-center mt-2">
                    <fieldset>
                        <legend>Imagem de Fundo</legend>
                        <div class="form-group col-md-12 col-sm-12 text-center">
                            <a class="btn btn-default" style="border:1px solid #333;" id="lfm" data-input="thumbnail" data-preview="holder" style="cursor: pointer">
                                <img src="{{ isset($data->image_thumb) && $data->image_thumb != null ? url("$data->image_thumb") : url('assets/admin/img/thumb.png') }}" id="holder" style="height: 100px;width: 100px;">
                            </a>
                            <input type="hidden" id="thumbnail" name="background_image" value="{{ isset($data->background_image) ? $data->background_image : '' }}">
                        </div>
                        <button class="btn-danger" onclick="removeBackgroundImage();" type="button"><i class="fa fa-trash"></i> </button>
                    </fieldset>
                </div>


                <div class="form-group col-md-6 col-sm-12 text-center mt-2">
                    <fieldset>
                        <legend>Video HTML5</legend>
                        <div class="form-group col-md-12 col-sm-12 text-center">
                            <a class="btn btn-default" style="border:1px solid #333;" id="lfm-video" data-input="thumbnail-video" style="cursor: pointer">
                             <i class="fa fa-video"></i>
                            </a>
                            <input type="text" id="thumbnail-video" name="background_video" value="{{ isset($data->background_video) ? $data->background_video : '' }}">
                        </div>
                        <button class="btn-danger" onclick="removeBackgroundVideo();" type="button"><i class="fa fa-trash"></i> </button>
                    </fieldset>
                </div>

        </div>

            </fieldset>


        </div>


    </form>

</div>

<script>

    $(document).ready(function () {
        $('#lfm').filemanager('image');
        $('#lfm-video').filemanager('file');
    });

    $("#divider").change(function(){
        var url = '{{url('img/shapes')}}';
        if(this.value == 0){
            $("#img-divider").attr('src','{{url('/img/grid.jpg')}}');
        }else{
            $("#img-divider").attr('src',`${url}/${this.value}.png`);
        }
    });


    function removeBackgroundImage(){
        $("#thumbnail").val('');
        $("#holder").attr('src','{{url('assets/admin/img/thumb.png')}}');
    }

    function removeBackgroundVideo(){
        $("#thumbnail-video").val('');
    }


</script>

