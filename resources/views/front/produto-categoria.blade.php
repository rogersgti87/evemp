<div class="tab-content">
    <div class="tab-pane active">
        <div class="container">
            @foreach($categorias as $categoria)
            <div class="row mb-2">
                <div class="col-12">
                    <h2 class="title-categorie">{{$categoria->nome}}</h2>
                </div>

                @foreach($produtos as $produto)
                @if($categoria->id === $produto->categoria_id)
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card card-product">
                        <div class="card-body d-flex align-items-center">
                            <picture>
                                <a href="#" data-toggle="modal" id="{{$produto->id}}" data-nome="{{$produto->nome}}" data-id="{{$produto->id}}" data-target="#modal-produto">
                                    <img src="{{$produto->imagem != '' && property_exists(json_decode($produto->imagem), 'thumb') ? url(json_decode($produto->imagem)->thumb) : url('assets/img/thumb.png')}}" alt="{{$produto->nome}}" class="img-fluid">
                                </a>
                            </picture>
                            <div class="flex-grow-1 content">
                                <h4><a href="#" data-toggle="modal" id="{{$produto->id}}" data-nome="{{$produto->nome}}" data-id="{{$produto->id}}" data-target="#modal-produto">{{ Str::limit($produto->nome,45) }}</a></h4>
                                <p>{{ Str::limit($produto->descricao,60) }}</p>
                                <div class="price">R$ {{ number_format($produto->valor,2,',','.')}}</div>
                                <div class="buttons">
                                    <a href="#" class="btn btn-sm btn-thema" data-toggle="modal" id="{{$produto->id}}" data-nome="{{$produto->nome}}" data-id="{{$produto->id}}" data-target="#modal-produto">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </div><!-- container -->
    </div><!-- tab-pane -->
</div><!-- tab-content -->