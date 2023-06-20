<div class="col-lg-4">
    <div class="text-center">
        <h3 class="h3">{{$subcategory->name}}</h3>
    </div>
    
    @if($subcategory->slug == 'cat-bowl' || $subcategory->slug == 'cat-others')
    <a class="category-img coming-soon" style="background-image: url({{$subcategory->image}}) ">
    <div class="ribbon-wrapper">
        <p class="ribbon-test">
            <span class="text">
                Очаквайте скоро
            </span>
        </p>
        </div>
        <div class="dark-blur"></div>
        {{--  <div class="content_img">
            <div>
                @if ($subcategory->slug == 'cat-bed')
                    Някакво инфо за легло котки
                @elseif($subcategory->slug == 'cat-bowl')
                    Някакво инфо за купи котки
                @elseif($subcategory->slug == 'cat-others')
                    Някакво инфо за други котки
                @elseif ($subcategory->slug == 'dog-bed')
                Някакво инфо за легло куче
                @elseif($subcategory->slug == 'dog-bowl')
                    Някакво инфо за купи куче
                @elseif($subcategory->slug == 'dog-others')
                    Някакво инфо за други куче
                @endif
            </div>
        </div>  --}}
    </a>
    @else 
        <a href="/category/{{$subcategory->slug}}" class="category-img" style="background-image: url({{$subcategory->image}}) ">
            <div class="dark-blur"></div>
            {{--  <div class="content_img">
                <div>
                    @if ($subcategory->slug == 'cat-bed')
                        Някакво инфо за легло котки
                    @elseif($subcategory->slug == 'cat-bowl')
                        Някакво инфо за купи котки
                    @elseif($subcategory->slug == 'cat-others')
                        Някакво инфо за други котки
                    @elseif ($subcategory->slug == 'dog-bed')
                    Някакво инфо за легло куче
                    @elseif($subcategory->slug == 'dog-bowl')
                        Някакво инфо за купи куче
                    @elseif($subcategory->slug == 'dog-others')
                        Някакво инфо за други куче
                    @endif
                </div>
            </div>  --}}
        </a>
    @endif
</div>