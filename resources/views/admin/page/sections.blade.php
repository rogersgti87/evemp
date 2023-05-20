<table class="table table-default">

    <tbody>
    @foreach($data as $result)
        <tr class="row1" style="padding:2px;" data-id="{{$result->id}}" id="{{$result->id}}">
            <td class="text-center bg-white">
                <div class="text-right">
                    <button type="button" data-toggle="modal" data-target="#modal-section" data-section-id="{{ $result->id }}" id="{{ $result->id }}"  class="btn btn-primary btn-xs p-1 mr-1"><i class="fas fa-pen-square"></i> Editar: {{$result->order}}</button>
                    <button type="button" id="{{ $result->id }}"  class="btn btn-danger btn-xs p-1 remove-section"><i class="fas fa-trash"></i> Remover</button>
                </div>
                <fieldset>
                    <legend>Módulos</legend>
                @foreach($pageSectionsModules as $psm)
                    @if($psm->section_id == $result->id)
                            <div class="btn-group p-3" style="border:1px dashed #ccc;">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton{{ $psm->psm_id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $psm->name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $psm->psm_id }}">
                                    <button class="dropdown-item edit-module" data-toggle="modal" data-path="{{$psm->path}}" data-target="#modal-form-module" id="{{ $psm->psm_id }}">Editar</button>
                                    <button class="dropdown-item bg-danger remove-module-section" id="{{ $psm->psm_id }}">Remover</button>
                                </div>
                            </div>
                    @endif
                @endforeach
                    <div class="btn-group p-3" style="border:1px dashed #ccc;">
                    <button type="button" data-toggle="modal" data-target="#modal-show-modules" id="{{ $result->id }}"  class="btn btn-md btn-primary"><i class="fas fa-plus"></i></button>
                    </div>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td style="padding: 1px !important;"></td>
        </tr>
    @endforeach
    </tbody>
</table>



<div id="modal-section" class="modal fade in" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn btn-dark" id="save-section"><i class="fas fa-icon-save"></i> Gravar</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-section">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal -->

<div id="modal-show-modules" class="modal fade in" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-show-modules">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal -->

<div id="modal-form-module" class="modal fade in">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="submit" class="btn btn-dark" id="save-form-module"><i class="fas fa-icon-save"></i> GRAVAR</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-form-module">

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal -->


<script>

    $("#modal-section").on("show.bs.modal", function(e) {
        var button = $(e.relatedTarget);
        var section_id = button.data('section-id');
        //console.log(section_id);
        var url = '{{ url($linkFormSection) }}'+'/'+section_id;
        //console.log(url);
        $.get(url,
            $(this)
                .addClass('modal-scrollfix')
                .find('.modal-body-section')
                .html('Carregando...'),
            function( data ) {
                $(".modal-body-section").html(data);
            });
    });


    $(document).ready(function(){
        $("#modal-show-modules").on("show.bs.modal", function(e) {
            var section_id = e.relatedTarget.id;
            var url = '{{ url($linkLoadModules.'?section_id=') }}'+section_id;
            $.get(url,
                $(this)
                    .addClass('modal-scrollfix')
                    .find('.modal-body-show-modules')
                    .html('Carregando...'),
                function( data ) {
                    $(".modal-body-show-modules").html(data);
                });
        });
    });


    $(document).ready(function(){
        $("#modal-form-module").on("show.bs.modal", function(e) {
            var button = $(e.relatedTarget);
            var path   = button.data('path');
            var url    = '{{ url($linkFormModule.'?id=') }}'+e.relatedTarget.id+'&path='+path;
            $.get(url,
                $(this)
                    .addClass('modal-scrollfix')
                    .find('.modal-body-form-module')
                    .html('Carregando...'),
                function( data ) {
                    $(".modal-body-form-module").html(data);
                });
        });
    });



</script>




