<nav class="breadcrumb">
    <div class="container">
        <a class="" href="/">Начало</a>
        @if(isset($first) && $first)
            <i class="fa fa-angle-double-right"></i>
            @if(isset($first['url']) && $first['url'] )
                <a href="{{$first['url']}}" class="">{{$first['text']}}</a>
            @else
                <span class="">{{$first['text']}}</span>
            @endif
        @endif   
        @if(isset($second) && $second)
            <i class="fa fa-angle-double-right"></i>
            <span class="">{{$second}}</span>
        @endif
    </div>
</nav>
