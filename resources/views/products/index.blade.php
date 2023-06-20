@extends('layout.index')
@section('content')

    <main>
        <div class="header-pages">
            <h1>
              @if(isset($category) && $category)
                 {{$parentCat->name}}
                 {{' - '}}
                 {{$category->name}}
              @else 
                 {{"Всички продукти"}}
              @endif
            </h1>
        </div>
        @if (isset($category) && $category)
          @include('layouts.breadcrumb',['first'=>['url'=>$parentCat->slug, 'text'=> $parentCat->name],'second'=>$category->name ])
            @else
            @include('layouts.breadcrumb',['first'=>['text'=> 'Всички продукти']])
        @endif
        {{-- @include('layouts.breadcrumb') --}}
        <div class="container-wrapper">
          <div class="container mrg-top-25">
            <div class="row g-3">

            @foreach ($products  as $product)
              @include('products.listing-single-grid',['product'=>$product])
            @endforeach

            </div>
          </div>
            {{-- @include('layouts.pets-model') --}}
            @include('layouts.top-orders')
        </div>
    </main>

@endsection
