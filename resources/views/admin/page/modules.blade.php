<fieldset>
    <legend>Módulos</legend>
    <div class="col-md-12">
        <div class="row">

            @foreach($modules as $module)
                <div class="col-3 p-1">
                    <button type="button" id="{{ $module->id }}" data-section-id="{{$section_id}}" class="btn btn-outline-info btn-block add-module-section">{{ $module->name }}</button>
                </div>
            @endforeach

        </div>
    </div>
</fieldset>
