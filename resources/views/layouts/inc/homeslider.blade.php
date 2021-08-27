<div class="rev_slider_wrapper">
    <div id="revolution-slider3" class="rev_slider" data-version="5.4.5" style="display: none">
        <ul>
            @foreach($data['sliders'] as $key =>$sliderdata)
            <li @if ($key%2==0) data-transition="incube" @elseif ($key%3==0) data-transition="slidedown" @else
                data-transition="fade" @endif data-slotamount="7" data-masterspeed="2000">
                <!--  BACKGROUND IMAGE -->
                <img src="{{ url("uploads/slider/",$sliderdata['sliderpic']) }}" alt="{{$sliderdata['title']}}" />
                <div class="tp-caption" data-x="center" data-y="['300','190','190','160']" data-whitespace="no-wrap"
                    data-frames='[{"delay":0,"speed":4500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                    <div class="slide-title slide-title-3">
                        {!!$sliderdata['description']!!}

                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
