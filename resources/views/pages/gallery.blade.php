@extends('layout.index')
@section('content')


    {{--  
            <div class="header-pages">
                <h1>Галерия</h1>
            </div>  --}}
    {{--  @include('layouts.breadcrumb')  --}}

    {{-- Start Parallax --}}
    <div class="parallax">
    </div>
    {{-- Edn Parallax --}}

    <div class="container">
        <main class="gallery">
            <nav class="c-tabs">
                <div class="nav nav-tabs row" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active col-md-4 text-center" id="nav-home-tab" data-toggle="tab"
                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Кучета</a>
                    <a class="nav-item nav-link col-md-4 text-center" id="nav-profile-tab" data-toggle="tab"
                        href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Котки</a>
                    <a class="nav-item nav-link col-md-4 text-center" id="nav-contact-tab" data-toggle="tab"
                        href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Поръчкови</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    1</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3
                </div>
            </div>
        </main>
    </div>
@endsection
