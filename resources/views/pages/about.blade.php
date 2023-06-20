@extends('layout.index')
@section('content')

    <main class="for-us">
        
        <div class="header-pages">
            <h1>За Нас</h1>
        </div>
         @include('layouts.breadcrumb') 

        @include('layouts.info-section')


        <div class="container-wrapper">
            <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="for-us-top">
                                <p>
                                    Ние от “Зоомебели” ООД, сме млад и иновативен екип от професионалисти.
                                </p>
                            </br><p>
                                     Всеки модел, всеки детайл е насочен да задоволи клиентските изисквания, като в същото време предложенията са стилни и достъпни. 
                                    Съобразявайки се с индивидуалния вкус на всеки клиент, ние предлагаме решение за обзавеждане в различен стил, цвят, лично вдъхновение. Възможни са комбинации на различни продукти с цел достигане на клиентско удовлетворение.
                                </p>
                            </br><p>
                                    Високо качество на материи и материали, съчетани с модерен дизайн и функция за вашите любимци, защото вярваме че те го заслужават.
                            </br> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-for-us">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-6 col-md-3 cell-for-us">
                                <div>
                                    <span>Екологични материали</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 cell-for-us">
                                <div>
                                    <span>Ръчна изработка</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 cell-for-us">
                                <div>
                                    <span>Масивна дървесина</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 cell-for-us">
                                <div>
                                    <span>Произведено в България</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
 

    </main>
@endsection