<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('')}}template/assets/images/logo_nyantai.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>NYANTAI - Nyantri Tahfidz Holiday</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('')}}template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('')}}template/assets/css/animated.css">
    <link rel="stylesheet" href="{{ asset('')}}template/assets/css/owl.css">
    <style>
        .js-preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            opacity: 1;
            visibility: visible;
            z-index: 9999;
            -webkit-transition: opacity 0.25s ease;
            transition: opacity 0.25s ease;
        }

        .js-preloader.loaded {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        @-webkit-keyframes dot {
            50% {
                -webkit-transform: translateX(96px);
                transform: translateX(96px);
            }
        }

        @keyframes dot {
            50% {
                -webkit-transform: translateX(96px);
                transform: translateX(96px);
            }
        }

        @-webkit-keyframes dots {
            50% {
                -webkit-transform: translateX(-31px);
                transform: translateX(-31px);
            }
        }

        @keyframes dots {
            50% {
                -webkit-transform: translateX(-31px);
                transform: translateX(-31px);
            }
        }

        .preloader-inner {
            position: relative;
            width: 142px;
            height: 40px;
            background: #fff;
        }

        .preloader-inner .dot {
            position: absolute;
            width: 16px;
            height: 16px;
            top: 12px;
            left: 15px;
            background: #36D7B7;
            border-radius: 50%;
            -webkit-transform: translateX(0);
            transform: translateX(0);
            -webkit-animation: dot 2.8s infinite;
            animation: dot 2.8s infinite;
        }

        .preloader-inner .dots {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            margin-top: 12px;
            margin-left: 31px;
            -webkit-animation: dots 2.8s infinite;
            animation: dots 2.8s infinite;
        }

        .preloader-inner .dots span {
            display: block;
            float: left;
            width: 16px;
            height: 16px;
            margin-left: 16px;
            background: #36D7B7;
            border-radius: 50%;
        }
        .share a button{
            border: 1px solid #36D7B7;
            border-radius: 5px;
            background-color: #fff;
            color: #36D7B7;
            }

            .share a button:hover{
            border: 1px solid #36D7B7;
            border-radius: 5px;
            background-color: #36D7B7;
            color: #fff;
            }
            .share a button{
            border: 1px solid #36D7B7;
            border-radius: 5px;
            background-color: #fff;
            color: #36D7B7;
            }

            .share a button:hover{
            border: 1px solid #36D7B7;
            border-radius: 5px;
            background-color: #36D7B7;
            color: #fff;
            }
        .card .card-body img{
            height: 100%;
        }
        @media (max-width: 547px){
            .card .card-body img{
            height: 30rem;
            }
        }
        @media (max-width: 487px){
            .card .card-body img{
            height: 25rem;
            }
        }
    </style>
</head>

<body style="background: lightgray">

    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
          <span class="dot"></span>
          <div class="dots">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ $show->image }}" class="w-100 rounded">
                        <hr>
                        <p class="tmt-3">
                            <a href="/" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-angles-left"></i> Kembali</a>
                            <button type="button" class="btn btn-sm btn-outline-success" id="share" tabindex="0"
                            data-bs-toggle="popover" data-bs-placement="right">
                            <span>Share <i class="fa-regular fa-share-from-square"></i></span>
                            </button>
                            <span class="float-right">{{$show->date}}</span>
                        </p>
                        <h4>{{ $show->title }}</h4>
                    </div>
                    <div hidden>
                        <div data-name="popover-content-share">
                          <div class="btn-group share" role="group">
                            <a
                              href="https://api.whatsapp.com/send?phone=6285728234562&text=Halo%20Admin!%0ASaya%20ingin%20order%20jasa%20Ansda">
                              <button type="button" class="btn m-2">
                                <span class="circle2"><i class="fa fa-whatsapp"></i></span>
                              </button>
                            </a>
                            <a
                              href="https://api.whatsapp.com/send?phone=6285728234562&text=Halo%20Admin!%0ASaya%20ingin%20order%20jasa%20Ansda">
                              <button type="button" class="btn m-2">
                                <span class="circle2"><i class="fa-brands fa-instagram"></i></span>
                              </button>
                            </a>
                            <a
                              href="https://api.whatsapp.com/send?phone=6285728234562&text=Halo%20Admin!%0ASaya%20ingin%20order%20jasa%20Ansda">
                              <button type="button" class="btn m-2">
                                <span class="circle2"><i class="fa-brands fa-facebook-f"></i></span>
                              </button>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
<script src="{{ asset('')}}template/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('')}}template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('')}}template/assets/js/owl-carousel.js"></script>
<script src="{{ asset('')}}template/assets/js/animation.js"></script>
<script src="{{ asset('')}}template/assets/js/imagesloaded.js"></script>
<script src="{{ asset('')}}template/assets/js/templatemo-custom.js"></script>

<script>
    $(document).ready(function () {

var options = {
  html: true,
  title: "Share to Social Media!!",
  //html element
  //content: $("#popover-content")
  content: $('[data-name="popover-content-share"]')
  //Doing below won't work. Shows title only
  //content: $("#popover-content").html()

}
var exampleEl = document.getElementById('share')
var popover = new bootstrap.Popover(exampleEl, options)
});

// const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
// const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>

</body>
</html>