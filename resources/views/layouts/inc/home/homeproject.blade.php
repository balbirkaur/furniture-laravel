<section class="latest-project">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                {!!$data['homesettings'][0]->project_text!!}

            </div>
        </div>
    </div>
    <div class="row no-gutters">
        @foreach($data['projects'] as $key =>$projectdata)
        @if(($key=="0") || ($key%2=="0"))
        <div class="col-lg-3 col-md-6">
            @endif
            <div class="latest__item   @if(($key==" 6")) lastproject @endif">
                <img alt="{{$projectdata['title']}}" src="{{ url('uploads/project/'.$projectdata->projectpic) }}" />
                <a href="{{ url('uploads/project/'.$projectdata->projectpic) }}" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3>{{$projectdata->title }}</h3>
                        <div class="cat-name">
                            <a href="">
                                <em>{{$projectdata->category->project_name }}</em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if(($key=="1") || ($key%2!="0"))
        </div>
        @endif
        @endforeach

    </div>
    <div class="col-md-12 see-more project-home">
        <a href="{{ url('projects') }}" class="au-btn au-btn--big au-btn--pill au-btn--yellow au-btn--white">See
            More</a>
    </div>
</section>
