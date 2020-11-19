
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">{{$header}}</h3>
            <div class="nk-block-des text-soft">
                @isset($detail_line)
                    <p>{{$detail_line}}</p>
                @endisset
            </div>
        </div><!-- .nk-block-head-content -->
        
        @if (isset($display_a))
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        @if (isset($parameter))
                            <li><a href="{{ url($url.'/'.$parameter) }}" class="btn btn-primary  text-white"><em class="icon ni {{$icon_a}}"></em><span>{{$display_a}}</span></a></li>
                        @else
                            <li><a href="{{ route($url) }}" class="btn btn-primary  text-white"><em class="icon ni {{$icon_a}}"></em><span>{{$display_a}}</span></a></li>
                        @endif

                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
        @endif

        @if (isset($display_b))
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <button type="button" id="{{isset($button_id)?$button_id:''}}" class="create-modal btn btn-primary">
                                <em class="icon ni {{$icon_b}}"></em>
                                <span>{{$display_b}}</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->