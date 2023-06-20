@extends('layout.index')
@section('content')

    <main class="custom-furtniture">
        <div class="header-pages">
            <h1>Поръчкови мебели</h1>
        </div>
        {{-- @include('layouts.breadcrumb') --}}

        <div class="container ">
            <div class="row info-section">
                <div class="col-md-4">
                    <img src="/img/svg/ruler-triangle.svg" alt="">
                    <div>
                        <p class="font-Ul">Харесвате модел но желаете различен цвят, материал или размер? Напишете ни имейл или се свържете на
                            посочения телефон.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="/img/svg/binoculars.svg" alt="">
                    <div>
                        <p class="font-Ul">Видяли сте желан модел от вас, изпратете ни писмо и снимка по имейла както и
                            описание.
                            Ще се свържем с вас!</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="/img/svg/time.svg" alt="">
                    <div>
                        <p class="font-Ul">Бързо и коректно обслужване на <a href="tel:0879141433">
                                тел. 0879 14 14 33</a> и имейл <a target="_blank"
                                href="mailto:zoomebeli@gmail.com">zoomebeli@gmail.com</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">
                        <article class="aside-custume-furniture">
                            <h5>
                                Видяли сте желан модел по интернет или имате собствено виждане?
                            </h5>
                            <h5>
                                Може да ни изпратите линкове или да прикачите снимки.
                            </h5>
                            <h5>
                                Поддържани формати за снимки <span style="font-family: Gilroy;">(до 5MB)</span> : jpg, jpeg и png.
                            </h5>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-12 ">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="/custom-furniture" method="post" id="custom-furniture" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="errordiv" for="username">Име и фамилия <span class="required-star">*</span></label>
                                    <input placeholder="Иван Иванов" value="" id="username"  minlength="8"  name="username" required type="text">
                                </div>
                                <div class="col-lg-12">
                                    <label class="errordiv" for="email">Имейл <span class="required-star">*</span></label>
                                    <input placeholder="ivanov@gmail.com" value="" name="email" type="email" id="email" required minlength="8" >
                                </div>

                                <div class="col-lg-12">
                                    <label class="errordiv" for="phone">Телефон <span class="required-star">*</span></label>
                                    <input placeholder="0892 ** ** **" value="" name="phone" type="phone" id="phone" required minlength="8" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="errordiv" for="subject">Относно <span class="required-star">*</span></label>
                                    <input placeholder="Поръчка" value="" name="subject" type="subject" id="subject" required minlength="8" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="errordiv"  for="msg">Съобщение <span class="required-star">*</span></label>
                                    <textarea placeholder="Интересува ме ..." type="text" id="msg" rows="3" name="msg" required minlength="5" ></textarea>
                                </div>
                            </div>
                            <div class="file-container">
                            <div class="row">
                                @for ($i = 1; $i < 4; $i++)
                                    <div class="col-sm-4">
                                        <div class="form-group file-upl">
                                            <input class="inputfile-[{{$i}}] inputfile" id="image[{{$i}}]" type="file" name="image[{{$i}}]"
                                            data-multiple-caption="{count} files selected" multiple>
                                            <label for="image[{{$i}}]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                                <span>Избор на снимка {{$i}}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                                <div class="row">
                                    <div class="btn-form-contact col-md-12 col-12">
                                        <div class="g-recaptcha" data-sitekey="6LcEl28aAAAAAASBM4MNeKIOqRAbS_ofIGmK6GF3"
                                            data-size="invisible"
                                            data-callback="onSubmit">
                                        </div>
                                        <button class="site-btn align-content-center btn btn-lg btn-filled site-color">Изпращане</button>
                                    </div>
                                </div>

                
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>

        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input ){
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;

            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 ){
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                }
                else {
                    
                    fileName = e.target.value.split( "\\" ).pop();
                }
                if( fileName ) {
                    label.querySelector( 'span' ).innerHTML = fileName;
                }
                else {
                    label.innerHTML = labelVal;
                }
            });
        });

        function onSubmit(token) {

          document.getElementById("custom-furniture").submit();
        }

      </script>

@endsection
