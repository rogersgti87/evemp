{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner" style="background:rgb(133, 125, 125);text-align: center;">
      <div class="carousel-item active">
        <img class="img-fluid" src="{{ $company->image_thumb != null ? url("$company->image_thumb") : url('assets/admin/img/thumb.png')}}" alt="{{ $company->name }}">
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>

  </div> --}}

  <div class="content">
    <div class="heading-block">
        <div style="background-color:#ccc; text-align:center;">
        <img class="img-fluid" src="{{ $company->image_thumb != null ? url("$company->image_thumb") : url('assets/admin/img/thumb.png')}}" alt="{{ $company->name }}">
        </div>
      <h2 style="text-align: center;">{{$company->name}}</h2>
    </div>
    <p>{!! $company->description !!}</p>
  </div><!-- content -->
