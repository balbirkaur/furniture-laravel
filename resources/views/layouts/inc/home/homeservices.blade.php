<section class="service">
    <div class="service-wrap">
        <div class="service__item service__intro" style="background-image: url('img/service-01.jpg')">
            <div class="service__item-inner">

                {!!$data['homesettings'][0]->aboutus_text!!}
                <div>
                    <a href="{{url('/aboutus')}}"
                        class="au-btn au-btn--big au-btn--pill au-btn--white au-btn--border au-btn--big">See
                        more</a>
                </div>
            </div>
        </div>
        <!-- end service intro -->
        @foreach($data['services'] as $key =>$servicedata)
        <div class="service__item"
            style="background-image: url({{ url('uploads/service/'.$servicedata->servicepic) }} )">
            <div class="service__item-inner">
                <span class="label--service white"><a
                        href="{{ url('services/'.$servicedata->id) }}">{{$servicedata->title }}</a></span>
            </div>
        </div>
        <!-- end service item -->
        @endforeach
    </div>
</section>
