  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner" style="background:rgb(133, 125, 125);text-align: center;">
      <div class="carousel-item active">
        <img class="img-fluid" src="{{$produto->imagem != '' && property_exists(json_decode($produto->imagem), 'normal') ? url(json_decode($produto->imagem)->normal) : url('assets/img/thumb.png')}}" alt="{{ $produto->nome }}">
      </div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
    
  </div>

  <div class="content">
    <div class="heading-block">
      <h1>{{$produto->nome}}</h1>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <p>{{$produto->descricao}}</p>
    <div class="price">R$ {{ number_format($produto->valor,2,',','.')}}</div>
  </div><!-- content -->