<nav>
    <ul class="breadcrumb breadcrumb-arrow">
        @if ($level==1)
            <li class="breadcrumb-item active">Tour Home</li>
        @elseif ($level>1)
            <li class="breadcrumb-item @if($level==2){active} @endif"><a href=" {{ route('tours.edit',{{$id}}) }} ">Tour Home</a></li>
            @if ($level>2)
                <li class="breadcrumb-item @if($level==3){active} @endif"><a href=" {{ route('{{ $level2_url }}',{{ $tour_id}}) }} ">{{ $level2 }}</a></li>
                @if ($level>3)
                    <li class="breadcrumb-item @if($level==4){active} @endif"><a href=" {{ route('{{$level3_url}}') }} ">{{ $level3 }}</a></li>
                    @if ($level>4)
                        <li class="breadcrumb-item @if($level==5){active} @endif"><a href=" {{ route('{{$level4_url}}') }} ">{{ $level4 }}</a></li>
                        @if ($level>5)
                            <li class="breadcrumb-item @if($level==6){active} @endif"><a href=" {{ route('{{$level5_url}}') }} ">{{ $level5 }}</a></li>
                            @if ($level>6)
                                <li class="breadcrumb-item @if($level==7){active} @endif"><a href=" {{ route('{{$level6_url}}') }} ">{{ $level6 }}</a></li>
                                @if ($level>7)
                                    <li class="breadcrumb-item @if($level==8){active} @endif"><a href=" {{ route('{{$level7_url}}') }} ">{{ $level7 }}</a></li>
                                    @if ($level>8)
                                        <li class="breadcrumb-item @if($level==9){active} @endif"><a href=" {{ route('{{$level8_url}}') }} ">{{ $level8 }}</a></li>
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif
                @endif
            @endif
            <li class="breadcrumb-item ">{{ $level0 }}</li>
        @endif
    </ul>
</nav>