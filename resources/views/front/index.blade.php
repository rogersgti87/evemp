<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>EVEMP | Evangélicos Empreendedores</title>

  <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/front/css/template.css')}}">
  <!-- includes -->
  <link rel="stylesheet" href="{{asset('assets/front/css/swiper.css')}}">
  <!-- custom original -->
  <link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
</head>

<body>
  <div class="loading-page"></div>
  <div class="">

    <header>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="header-title">
              <h1 class="">EVEMP</h1>
              <button type="button" class="btn btn-sm btn-primary openMenu"><i class="fa fa-bars"></i></button>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="navMenu">
      <div class="heading-block">
        <h2>EVEMP</h2>
        <button class="closeMenu"><span aria-hidden="true">&times;</span></button>
      </div>
      <ul>
        <li><a href="#" data-toggle="modal" data-target="#modal-register-user">Cadastrar Membro</a></li>
        <li><a href="{{ url('/admin') }}">Área do Membro</a></li>
      </ul>
    </div><!-- navMenu -->


    <nav class="menu-categories">
      <div class="container swiper-container">
        <div class="swiper-wrapper">
          <!-- <div class="swiper-slide">
            <button onclick="produtoCategoria(this);" data-nome="Todas Categorias" class="btn btn-primary">Mostrar tudo</button>
            </div> -->
          @foreach($categories as $cat)
          <div class="swiper-slide categoria">
            <div id="categorie-{{$cat->id}}">
              <img style="border-radius: 50%;border:1px solid #333;" src="{{$cat->image != '' && property_exists(json_decode($cat->image), 'original') ? url(json_decode($cat->image)->original) : ''}}" alt="{{$cat->name}}" onclick="produtoCategoria(this);" data-nome="{{$cat->name}}" data-id="{{$cat->id}}">
              <p onclick="produtoCategoria(this);" data-nome="{{$cat->name}}" data-id="{{$cat->id}}">{{$cat->name}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </nav>
    <div style="text-align:center;">
    <h1>Site em desenvolvimento!</h1>
    </div>

    <main>
      <section class="section-products">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div id="preloader-product">
                <div class="lds-ellipsis">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Modal Product -->
      <div class="modal fade" id="modal-produto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body-produto"></div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    <!-- Modal Product -->
    <div class="modal fade" id="modal-register-user">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body-user"></div>
            <div class="modal-footer">
                <button type="button" id="btn-salve-user" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
        </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    </main>
  </div><!-- wrapper -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/04571ab3d2.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- includes -->
  <script src="{{url('assets/front/js/swiper.js')}}"></script>
  <script src="{{url('assets/front/js/functions.js')}}"></script>
  <script>
    // import Swiper from '{{url("assets/front/js/swiper-bundle.esm.browser.min.js")}}'

    var mySwiper = new Swiper('.swiper-container', {
      // Optional parameters
      autoplay: {
        delay: 2000,
        disableOnInteraction: false
      },
      direction: 'horizontal',
      loop: true,

      slidesPerView: 2,
      spaceBetween: 5,

      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 3,
          spaceBetween: 5
        },
        390: {
          slidesPerView: 4,
          spaceBetween: 5
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 5,
          spaceBetween: 10
        },
        // when window width is >= 640px
        640: {
          slidesPerView: 6,
          spaceBetween: 10
        },
        // when window width is >= 980px
        980: {
          slidesPerView: 7,
          spaceBetween: 10
        },
        // when window width is >= 1260px
        1260: {
          slidesPerView: 9,
          spaceBetween: 5
        },

      },

      on: {
        init: function() {
          checkArrow();
        },
        resize: function() {
          checkArrow();
        }
      }


    });


    function checkArrow() {
      var swiperPrev = document.querySelector('.swiper-button-prev');
      var swiperNext = document.querySelector('.swiper-button-next');

      swiperPrev.style.display = 'none';
      swiperNext.style.display = 'none';

    }
  </script>

  <script>
    $('.openMenu, .closeMenu').click(function() {
      $('.navMenu').toggleClass('open');
    });


    $('.navMenu a').click(function(){
      $('.navMenu').toggleClass('open');
      var isOpenMenu = $('.navMenu').hasClass('open');
      if(!isOpenMenu){
        $('.navMenu').removeClass('open');
      }
    });
  </script>


  <script>
    $(document).ready(function() {
      var url = '{{ url('produto-categoria') }}';
      $.get(url,
        $(this).html('Carregando...'),
        function(data) {
          $(".section-products").html(data);
        });
    });
    $("#modal-produto").on("show.bs.modal", function(e) {
      var url = '{{ url('modal-produto') }}' + '/' + e.relatedTarget.id;
      // var nome_produto = $(e.relatedTarget).data('nome');
      $.get(url,
        $(this)
        .addClass('modal-scrollfix')
        .find('.modal-body-produto')
        .html('Carregando...'),
        function(data) {
          // $('.modal-title-produto').html(nome_produto);
          $(".modal-body-produto").html(data);
        });
    });

    $("#modal-register-user").on("show.bs.modal", function(e) {
      var url = '{{ url('register-user') }}';
      $.get(url,
        $(this)
        .addClass('modal-scrollfix')
        .find('.modal-body-user')
        .html('Carregando...'),
        function(data) {
          $(".modal-body-user").html(data);
          $('#telephone').mask('(00)0000-00000');
          $('#whatsapp').mask('(00)0000-00000');
        });
    });

    function produtoCategoria() {
      var categoria_id = $(event.target).data('id');
      // var categoria_nome = $(event.target).data('nome');

      $('.menu-categories img').removeClass('active');
      $('#categorie-'+categoria_id).parent().find('img').addClass('active')


      if (categoria_id === undefined) {
        var url = '{{ url('produto-categoria') }}';
      } else {
        var url = '{{ url('produto-categoria') }}' + '/' + categoria_id;
      }
      $.ajax({
        url: url,
        method: 'GET',
        beforeSend: function() {
          preLoaderProduct();
        },
        success: function(data) {
          $(".section-products").html(data);
        },
      });
    }

    function preLoaderProduct() {
      $('#preloader-product').show();
    }
  </script>


<script>

    //Save data
        $(document).on('click', '#btn-salve-user', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });

            var data = $('.form-register-user').serialize();

            $.ajax({
                url: "{{url('register-user')}}",
                data:data,
                method:'POST',
                success:function(data){
                    console.log(data);
                    Swal.fire({
                        width:350,
                        title: "<h5 style='color:#007bff'>" + data + "</h5>",
                        icon: 'success',
                        showConfirmButton: true,
                        confirmButtonColor: "btn-success",
                        showClass: {
                            popup: 'animate__animated animate__backInUp'
                        },
                        allowOutsideClick: false,
                    }).then(function() {
                        window.location = "{{url('/')}}";
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


    </script>

</body>

</html>
