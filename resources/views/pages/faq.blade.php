@extends('layout.index')
@section('content')

    <main class="faq">
        <div class="header-pages">
            <h1>Често задавани въпроси</h1>
        </div>
        @include('layouts.breadcrumb')
        <div class="container container-wrapper">
            <div class="row">
                <div class="col-12">

                    <section>
                        <div>
                            <div><span class="site-color">В.</span></div>
                            <h3>От какъв материал са изработени артикулите?</h3>
                        </div>
                        <div>
                            <div><span class="site-color-o">О.</span></div>
                            <p>Дървения материал се състои от масивна дървесина - чам и мебелен шперплат за когото смятаме, че най-
                                добре се съчетава с различни видове обзавеждане.</br>
                                Възглавниците са изработени от висококачествена дамаска и силиконов пух
                                които се срещат в холната гарнитура. Калъфките се перат до 40 градуса, не се
                                препоръчва използване на сушилня.</br>
                                Купичките са изработени от неръждаема стомана.</p>
                        </div>
                    </section>
                    <section>
                        <div>
                            <div><span class="site-color">В.</span></div>
                            <h3>Какви са моите размери?</h3>
                        </div>
                        <div>
                            <div><span class="site-color-o">О.</span></div>
                            <p>В секция “Информация” на всеки артикул, може да видите кой размер е
                            подходящ за породата на вашия любимец.</p>
                        </div>
                    </section>
                    <section>
                        <div>
                            <div><span class="site-color">В.</span></div>
                            <h3>Колко струва доставката?</h3>
                        </div>
                        <div>
                            <div><span class="site-color-o">О.</span></div>
                            <p>Цената на доставката се калкулира в количката, след избор на адрес на
                                доставка.</em>
                            </br>
                                За повече информация <a style="color:#D66647;font-weight:bold;" href="/delivery">вижте тук!</a>
                            </p>
                        </div>
                    </section>
                    <section>
                        <div>
                            <div><span class="site-color">В.</span></div>
                            <h3>Ще получа ли потвърждение за поръчката си?</h3>
                        </div>
                        <div>
                            <div><span class="site-color-o">О.</span></div>
                            <p>Да, веднага след като завършите поръчката си, автоматично ще получите
                                имейл за направена поръчка от zoomebeli.bg След като обработим поръчката
                                Ви, ще получите телефонно обаждане за потвърждение на поръчката. След
                                изпращане на поръчката ще получите имейл с номер на товарителница на
                                пратката.</p>
                        </div>
                    </section>
                    <section>
                        <div>
                            <div><span class="site-color">В.</span></div>
                            <h3>Как се връщат артикули?</h3>
                        </div>
                        <div>
                            <div><span class="site-color-o">О.</span></div>
                            <p>Можете да върнете артикули към нас за рекламация с касовите бележки или
                                тяхно копие и номер на поръчката ако отговарят на нашите <a style="color:#D66647;font-weight:bold;" href="http://zoomebeli.bg/terms#refund">Гаранционни
                                условия </a>. Молим да ни уведомите по имейл за доуточнение на казуса.</br><br/>
                                Разноските по транспорта са за сметка на клиента.</p>
                        </div>
                    </section>
                    <section>
                        <div>
                            <div><span class="site-color">В.</span></div>
                            <h3>Може ли да променя размера, цвета и материала на харесан артикул?</h3>
                        </div>
                        <div>
                            <div><span class="site-color-o">О.</span></div>
                            <p>Може да изпратите запитване на адрес: <a style="color:#D66647;font-weight:bold;" href="http://zoomebeli.bg/custom-furniture">http://zoomebeli.bg/custom-furniture</a>
                                и ние ще Ви върнем отговор дали е изпълнимо и подробностите около него.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection
