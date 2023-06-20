<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Зоо Мебели</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/css/product-view.css">
    <link rel="stylesheet" href="/css/lightslider.min.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <!-- Hotjar Tracking Code for zoomebeli.bg -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2300340,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="google-site-verification" content="BCjRsmasDYACmFlP2ooulPGTo7mS3VQF1gMeMs73avo" />
</head>

<body>
    <!-- Content -->

    @include('layouts.header')

    <main role="main">
        @yield('content')
    </main>

    <div id="zoomebeli_coockie_policy">
        <div class="row">
            <div class="col-md-4 col-sm-12 button-fixed">
              <div class="p-3 pb-4 bg-custom text-white">
                <div class="row">
                  <div class="col-12">
                    <h2>Разрешаване на бисквитки</h2>
                  </div>
                  <div class="text-center c-cancel">
                    <i class="fa fa-times"></i>
                  </div>
                </div>
                <p>Този сайт използва бисквитки (cookies), за най-оптимално функциониране.
                </p>
                <button type="button" class="btn w-100">Съгласен съм</button>
              </div>
            </div>
          </div>
    </div>
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/js/validate.min.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/lightslider.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/main.js"></script>

    {{--  <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5f2031795e51983a11f5f173/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

    </script>
    <!--End of Tawk.to Script-->  --}}
    @yield('js')
</body>

</html>
