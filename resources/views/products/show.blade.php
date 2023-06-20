@extends('layout.index')
@section('content')

    <main class="product-view">
        <div class="header-pages">
            <h1>{{ $product->title }}</h1>
        </div>

        @include('layouts.breadcrumb',['first'=>['text'=>$product->title]])

        <div class="container-wrapper">
            <div class="container marketing">
                <div class="row">
                    <div class="col-lg-7">
                        <ul class="imageGallery">
                            @foreach ($product->images as $image)
                                <li data-fancybox="images-preview2" data-thumb="{{ $image->image }}"
                                    data-src="{{ $image->image }}">
                                    <img src="{{ $image->image }}" />
                                </li>
                            @endforeach
                        </ul>
                        <div class="item-description">
                            {{--  <div class="block-table">
                                <table>
                                    <colgroup>
                                        <col style="width: 30%">
                                        <col style="width:70%">
                                      </colgroup>
                                    <thead>
                                        <tr>
                                            <th colspan="2">Описание</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Материали</td>
                                            <td>чам, неръждаема стомана и мебелен шперплат(дъно)</td>
                                        </tr>
                                        <tr>
                                            <td>Възглавница</td>
                                            <td>
                                                <span class="font-gw d-block">S: 52х40см (Д-Ш)</span>
                                                <span class="font-gw d-block">M: 75x50см (ДхШ)</span>
                                                <span class="font-gw d-block">L: 105x70см (ДхШ)</span>
                                                Дамаска 100 % полиестер, вътрешна калъфка със силиконов пух, външна калъфка с цип - пране до 40 C&deg; (не се препоръчва сушилня)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Външни размери</td>
                                            <td>
                                                <span class="font-gw d-block">S: 57-24-45см (Д-В-Ш)</span>
                                                <span class="font-gw d-block">M: 80-29-55см (Д-В-Ш)</span>
                                                <span class="font-gw d-block">L: 110.5-34-75.5см (Д-В-Ш)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Финиш продукти</td>
                                            <td>лак и байц на водна основа (безопасни за здравето на вашите любимци)</td>
                                        </tr>
                                        <tr>
                                            <td>Тегло</td>
                                            <td>
                                                <span class="font-gw d-block">S: 6 кг</span>
                                                <span class="font-gw d-block">M: 8 кг</span>
                                                <span class="font-gw d-block">L: 11 кг</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  --}}
                            <div>{!! $product->description !!}  </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <nav class="c-tabs">
                            <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active col-md-4 text-center" id="nav-detail-tab"
                                    data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail"
                                    aria-selected="true">ДЕТАЙЛИ</a>
                                <a class="nav-item nav-link col-md-4 text-center" id="nav-size-tab" data-toggle="tab"
                                    href="#nav-size" role="tab" aria-controls="nav-size"
                                    aria-selected="false">ИНФОРМАЦИЯ</a>
                                <a class="nav-item nav-link col-md-4 text-center" id="nav-material-tab" data-toggle="tab"
                                    href="#nav-material" role="tab" aria-controls="nav-material"
                                    aria-selected="false">ИНТЕРЕСНО</a>
                            </div>
                        </nav>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-detail" role="tabpanel"
                                aria-labelledby="nav-detail-tab">
                                <form action="">
                                    <h4>{{ $product->title }}</h4>

                                    <div class="price-product-section">
                                        <div id="bigPrice" class="price">
                                            @include('products.bigPrice',['price'=>$product->defaultVariation()->price()])
                                        </div>
                                    </div>
                                    
                                    <div>Тегло: <span
                                        id="weight">{{ $product->defaultVariation()->weight }}
                                    </span> кг.</div>
                                    @foreach ($product->attributes as $attribute)
                                        <div>
                                            <label for="attribute">{{ ucfirst($attribute->name) }}</label>
                                            <select required name="attribute" data-attribute_id="{{ $attribute->id }}"
                                                class="form-control is-attribute select2_test">
                                                <option value="0">Изберете {{ $attribute->name }}</option>
                                                @foreach ($attribute->options as $option)
                                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                    <div>
                                        <label for="size">Размер</label>
                                        <select id="js-size" name="size" class="form-control js-size select2_test">
                                            @foreach ($product->variations as $variation)
                                                <option
                                                    {{ $variation->size == $product->defaultVariation()->size ? ' selected ' : '' }}
                                                    value="{{ $variation->size }}">{{ $variation->size }}</option>
                                            @endforeach
                                        </select>
                                        <span>(Незнаете кой размер сте?Погледнете в таб информация.)</span>
                                    </div>

                                    @if ($product->id == '3')
                                        <div>
                                            <label for="">
                                                Добавете вашата персонализация
                                                <br /> Вижте описанието на артикула за подробности
                                            </label>
                                            <textarea name="note" id="js-note"></textarea>
                                        </div>
                                    @endif

                                    <button id="js-add_to_cart" class="btn-product-view" type="button">
                                        <div>
                                            Добави в кошницата
                                        </div>
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-size" role="tabpanel" aria-labelledby="nav-size-tab">
                                <div class="scroll-wrapper">
                                    <h1>Кучета</h1>
                                    <h4 class="text-center">Къщи и легла:</h4>
                                    <div  class="block-table">
                                        
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>S размер </br> (1-10 кг):</th>
                                                <th>M размер </br> (11-25кг):</th>
                                                <th>L размер </br> (25-50кг):</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>померан</td>
                                                <td>стафордшир териер</td>
                                                <td>голдън ретривър</td>
                                            </tr>
                                            <tr>
                                                <td>чихуахуа</td>
                                                <td>френски булдог</td>
                                                <td>лабрадор ретривър</td>
                                            </tr>
                                            <tr>
                                                <td>йоркшир териер</td>
                                                <td>американски питбул</td>
                                                <td>хъски</td>
                                            </tr>
                                            <tr>
                                                <td>мопс</td>
                                                <td>английски булдог</td>
                                                <td>немска овчарка</td>
                                            </tr>
                                            <tr>
                                                <td>мини пинчер</td>
                                                <td>кокер шпаньол</td>
                                                <td>боксер</td>
                                            </tr>
                                            <tr>
                                                <td>джак ръсел</td>
                                                <td>бийгъл</td>
                                                <td>акита</td>
                                            </tr>
                                            <tr>
                                                <td>дакел</td>
                                                <td>среден немски шпиц</td>
                                                <td>бордър коли</td>
                                            </tr>
                                            <tr>
                                                <td>болонка</td>
                                                <td></td>
                                                <td>доберман</td>
                                            </tr>
                                            <tr>
                                                <td>пекинез</td>
                                                <td></td>
                                                <td>чау чау</td>
                                            </tr>
                                            <tr>
                                                <td>ши-тцу</td>
                                                <td></td>
                                                <td>самоед</td>
                                            </tr>
                                            <tr>
                                                <td>корги</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    
                                    <p>
                                        Килограмите са ориентировъчни. Категориите са разделени спрямо дължина на кучето. 
                                    </br>Площ за спане:<span class="size-ff"> S-52x40 см., М-75х50 см., L-105x70 см.</span>
                                    <span class="important-info-span">Цената включва възглавница.</span>
                                    </p>

                                    <div>

                                        <h4 class="text-center">
                                            Поставки за храна (ДхВхШ):
                                        </h4>
                                        <ul>
                                            <li>
                                                <span>S размер: 35х10х18 см.</span> Купички: 14x5.4 см. (Диаметър х Дълбочина), 500ml
                                            </li>
                                            <li>
                                                <span>М размер: 42х17х20 см.</span> Купички: 16.3х6.7 см. (Диаметър х Дълбочина), 850ml
                                            </li>
                                            <li>
                                                <span>L размер: 50х27х25 см.</span> Купички: 21.3х7.9 см. (Диаметър х Дълбочина), 1800 ml
                                            </li>
                                        </ul>
                                    </div>
                                    <p>Категориите поставки не винаги отговарят на тези за легла. За да сте сигурни в избора си, премерете височината на предните крака на вашето куче.
                                        <span class="important-info-span">Цената включва 2 бр. купички.</span>
                                    </p>
                                    
                                    <h1>
                                        Котки
                                    </h1>
                                    <p>
                                        <span class="important-info-span">
                                            Всички котки използват S размер легла и поставки за храна.
                                        </span>
                                    </p>
                                    <p>
                                        <span class="important-info-span">
                                            Цената включва съответно възглавница и 2 бр. купички.
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-material" role="tabpanel" aria-labelledby="nav-material-tab">
                                <div>
                                    <h5>Любимците имат ли нужда от легло?</h5>
                                    <p>Подобно на хората, любимците се нуждаят от легла по множество причини. Леглата не само имат голяма полза за здравето, но предлагат и безопасно място, където те могат да се отпуснат и да се чувстват комфортно. Освен това, ако любимеца ви спи на едно място, почистването ви е по-лесно.</p>
                                </div>
                                <div>
                                    <h5>
                                        Как да спра любимеца да не унищожи леглото си? 
                                    </h5>
                                    <p>
                                        Най-добрият начин да предпазите леглото им е да ги разхождате редовно и/или да ги стимулирате с интерактивни играчки.
                                    </p>
                                </div>
                                <div>
                                    <h5>
                                        Поставките за купички решават проблемно поведение при кучетата!
                                    </h5>
                                    <p>
                                        Някои кучета, особено тези които обичат водата, понякога гребят във водните си купи, сякаш е басейн. Други пък гонят плъзгащи се купи по пода. Нашите поставки са с гумирани крака и обезкуражават кучетата да превръщат своя източник на вода в басейн.
                                    </p>
                                </div>
                                <div>
                                    <h5>
                                        Поставките за купички облекчават здравословни проблеми!
                                    </h5>
                                    <p>
                                        Вашият ветеринарен лекар може да предложи повдигната хранилка, ако кучето ви не може удобно да слезе на нивото на пода. Кучетата с артрит, други възпалителни състояния, наранявания на врата или гърба или други здравословни състояния, които правят подвижността надолу трудна или болезнена ще имат полза от такива поставки.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
            <div id="myModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="modal-header">
                            <h5 class="modal-title">Моля изберете опция за
                                <?php $i = 0; ?>
                                @foreach ($product->attributes as $attribute)
                                    @if ($i > 0)
                                        {{ ', ' }}
                                    @endif
                                    {{ $attribute->name }}
                                    <?php $i++; ?>
                                @endforeach
                                .
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-ajax-loading">
            </div>

        <div id="attribute_modal" class="modal fade in" id="added-product" tabindex="-1" role="dialog"
        aria-labelledby="post-add-to-cart" aria-hidden="true"></div>
        

            {{-- @include('layouts.modals.table-with-size') --}}

            @include('layouts.pets-model')
            @include('layouts.top-orders')
        </div>
    </main>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#js-add_to_cart').on('click', function(e) {

                $success = $('.model-success');
                var attributes = [];
                var attributes_val = true;

                $('.is-attribute').each(function() {
                    var attribute_id = $(this).attr('data-attribute_id');
                    var attribute_object = {};
                    attribute_object[attribute_id] = $(this).val();
                    attributes.push(attribute_object);

                    // Validate select option
                    if ($(this).val() == 0) {
                        attributes_val = false;
                        $(this).addClass('ivalidAttribute');
                        return;
                    } else {
                        $(this).removeClass('ivalidAttribute');
                    }

                });

                $('.is-attribute').on('change', function() {
                    if ($(this).val() != 0) {
                        $(this).removeClass('ivalidAttribute');
                    } else {
                        $(this).addClass('ivalidAttribute');
                    }
                })


                if (attributes_val != false) {
                    $.ajax({
                        method: "POST",
                        url: "/cart/{{ $product->id }}",
                        data: {
                            attributes: attributes,
                            size: $('#js-size').val(),
                            note: $('#js-note').val(),
                        },
                    }).done(function(data) {
                        $('#attribute_modal').html(data.modal)
                        $('#attribute_modal').modal('toggle');
                        $('#js-top_mini_cart').html(data.top_mini_cart);
                        // $( this ).addClass( "done" );
                    });
                } else {
                    $('#myModal').modal('toggle')
                }
            })


            $('#js-size').on('change', function(e) {
                $body = $("body");
                $body.addClass("loading");

                var attributes = [];
                $.ajax({
                    method: "get",
                    url: "/products/getProductInfoBySize",
                    data: {
                        product_id: {{ $product->id }},
                        size: $(this).val(),
                    },
                }).done(function(data) {
                    $body.removeClass("loading");
                    $('#bigPrice').html(data.bigPriceHtml);
                    $('#weight').html(data.weight);
                    // $( this ).addClass( "done" );
                });
            })
        });

    </script>

@endsection
