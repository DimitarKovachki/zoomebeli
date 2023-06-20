@extends('layout.index')
@section('content')

    <main class="dog">
        <div class="header-pages">
            {{--  {{
                dd($category)
            }}  --}}
            <h1>Мебели За {{$category->name}}</h1>
        </div>
        {{--  @include('layouts.breadcrumb')  --}}
        <div class="container-wrapper">
            <div class="container marketing">
                <div class="row">
                    @foreach ($subcategories as $subcategory)
                        @include('category.listing-single-grid',['subcategory'=>$subcategory])
                    @endforeach
                </div>
            </div>
            @include('layouts.pets-model')
            @include('layouts.top-orders')
        </div>
    </main>

@endsection
