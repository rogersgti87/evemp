

  <div class="col-12 col-sm-12">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Empresa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Contato</a>
          </li>
        </ul>
      </div>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner" style="background:rgb(133, 125, 125);text-align: center;">

        @foreach($company_image as $ci)
        @if($loop->first)
        <div class="carousel-item active">
            <img class="img-fluid" src="{{ $ci->image != null ? url("$ci->image") : url('assets/admin/img/thumb.png')}}" alt="{{ $ci->image }}" style="height:300px;">
        </div>
        @else
        <div class="carousel-item">
            <img class="img-fluid" src="{{ $ci->image != null ? url("$ci->image") : url('assets/admin/img/thumb.png')}}" alt="{{ $ci->image }}" style="height:300px;">
        </div>
        @endif
        @endforeach

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

      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

            <div class="">

                <div class="heading-block">
                    <div style="border:#333 solid 1px; text-align:center;">
                    <img class="img-fluid" src="{{ $company->image_original != null ? url("$company->image_original") : url('assets/admin/img/thumb.png')}}" alt="{{ $company->name }}" style="max-height:99px;">
                    </div>
                  <h4 style="text-align: center;">{{$company->name}}</h4>
                </div>

                <h4 class="card-title">Descrição</h4>

            <div class="card-body">
                {!! $company->description !!}
            </div>
            </div>

          </div>
          <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

            <div class="">

                <h4 class="card-title">Contato</h4>

                <div class="card-body">

                    <div class="text-center p-4">
                    <a class="btn-block btn btn-sm btn-success" href="https://wa.me/55{{ removeEspeciais($company->whatsapp) }}?text=Olá, estou vindo através do site evemp.com.br!" target="_blank">
                        <i class="fa-brands fa-whatsapp"></i> Fale conosco
                    </a>
                    </div>

                    <ul>
                        <li>Telefone: {{ $company->telephone }}</li>
                        <li>Whatsapp: {{ $company->whatsapp }}</li>
                        <li>E-mail: {{ $company->email }}</li>
                    </ul>

                    <ul>
                        <li>Facebook: <i class="fa-brands fa-facebook"></i><a href="{{$company->facebook }}" target="_blank"></a></li>
                        <li>Instagram: <i class="fa-brands fa-instagram"></i><a href="{{$company->instagram }}" target="_blank"></a></li>
                        <li>Youtube: <i class="fa-brands fa-youtube"></i><a href="{{$company->youtube }}" target="_blank"></a></li>
                    </ul>

                    <ul>
                        <li>{{ $company->address.', '.$company->number }}</li>
                        <li>{{ $company->district.' - '.$company->city.' '.$company->state.' '.$company->cep }}</li>
                        <li>{{ $company->complement }}</li>
                    </ul>

                </div>


            <div class="card card-danger">
                <h4 class="card-title">Localização</h4>
                <div class="card-body">
                    <div class="google-map">
                        {!! $company->google_maps !!}
                    </div>
                </div>
                </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>

