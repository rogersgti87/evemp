<div class="tab-content">
    <div class="tab-pane active">
        <div class="container">

            <div class="row mb-2">

                @foreach($companyCategories as $cc)
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card card-product">
                        <div class="card-body d-flex align-items-center">
                            <picture>
                                <a href="#" data-toggle="modal" id="{{$cc->company_slug}}" data-nome="{{$cc->name}}" data-id="{{$cc->id}}" data-target="#modal-company">
                                    <img style="border:1px solid #333; height:80px;width:80px;" src="{{ $cc->image_original != null ? url("$cc->image_original") : url('assets/admin/img/thumb.png')}}" alt="{{$cc->name}}">
                                </a>
                            </picture>
                            <div class="flex-grow-1 content">
                                <h4><a href="#" data-toggle="modal" id="{{$cc->company_slug}}" data-nome="{{$cc->name}}" data-id="{{$cc->id}}" data-target="#modal-company">{{ Str::limit($cc->name,45) }}</a></h4>
                                <p><i class="fa-solid fa-phone"></i> {{ $cc->telephone }}</p>
                                <p><i class="fa-brands fa-square-whatsapp"></i> {{ $cc->whatsapp }}</p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><!-- container -->
    </div><!-- tab-pane -->
</div><!-- tab-content -->
