@extends('layout.index')
@section('content')

    <main class="contact">
        <div class="header-pages">
            <h1>Контакти</h1>
        </div>
        
        @include('layouts.breadcrumb',['first'=>['text'=>'контакти']])
        @if ($errors->any())
            <div class="container">
                <div class="row">
                    <div class="col-md-9 m-alert m-alert--icon alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="wrapper">
            <div class="container-fluid container section1">
                    <div class="row">

                        <div class="col-lg-7 order-2 order-sm-1">
                            <div class="contact-error">

                            </div>
                            <form action="/contact" method="post" id="contact-form">
                                @csrf
                                <div class="form-group">
                                    <label class="errordiv" for="username">Име и фамилия <span class="required-star">*</span></label>
                                    <input placeholder="Иван Иванов" id="username" type="text" value="" minlength="5" required name="username">
                                </div>
                                <div class="form-group">
                                    <label  class="errordiv" for="email">Имейл <span class="required-star">*</span></label>
                                    <input placeholder="ivanov@gmail.com" type="email" id="email" name="email" minlength="5" required value="">
                                </div>
                                <div class="form-group">
                                    <label  class="errordiv" for="subject">Относно <span class="required-star">*</span></label>
                                    <input placeholder="Поръчка" id="subject" type="text" name="subject" minlength="5" required value="">
                                </div>
                                <div class="form-group">
                                    <label class="errordiv"  for="msg">Съобщение <span class="required-star">*</span></label>
                                    <textarea placeholder="Интересува ме ..." type="text" id="msg" rows="3" name="msg" minlength="5" required></textarea>
                                </div>
                                <div class="form-check">
                                    <div class="g-recaptcha" data-sitekey="6LcEl28aAAAAAASBM4MNeKIOqRAbS_ofIGmK6GF3"
                                        data-size="invisible" 
                                        data-callback="onSubmit">
                                    </div>
                                    <button class="site-btn align-content-center btn btn-lg btn-filled site-color">Изпращане</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 order-1 order-sm-2">
                            <div class="row top-contact">
                                <div class="col-md-12">
                                    <div class="mail-contact">
                                        <a href="mailto: zoomebeli@gmail.com">
                                            <img src="/img/svg/mail-contact.svg" alt="">
                                        </a>

                                        <a href="mailto: zoomebeli@gmail.com">
                                            <span>zoomebeli@gmail.com</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="phone-contact">
                                        <a href="tel:0879 14 14 33">
                                            <img src="/img/svg/phone-contact.svg" alt="">
                                        </a>
                                        <div>
                                            <span>
                                                <a href="tel:0879 14 14 33">0879 14 14 33</a>
                                            </span>
                                            <span>
                                                <a href="tel:0879 14 14 33">
                                                    позвънете </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row contact-social">
                                <div class="col-lg-12">
                                    <a href="https://www.facebook.com/ZooMebeli/">
                                        <img src="/img/svg/facebook-circle-icon.svg" alt="">
                                    </a>
                                    <a href="https://www.instagram.com/zoomebeli/">
                                        <img src="/img/svg/instagram-icon.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>

            </div>
        </div>
        </div>
    </main>
    <script>

        function onSubmit(token) {
          
          document.getElementById("contact-form").submit();
        }

      </script>

@endsection
