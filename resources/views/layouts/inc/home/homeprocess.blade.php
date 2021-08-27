<section class="our-process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                {!!$data['homesettings'][0]->process_text!!}

            </div>
        </div>
        <div class="row">
            @foreach($data['process'] as $key =>$processdata)
            <div class="col-lg-3 col-md-6 col-12">
                <div @if(($key=="0" ) || ($key=="2" ))class="our-process__item our-process__item--l-b" @elseif($key=="1"
                    )class="our-process__item our-process__item--l-b" @else class="our-process__item" @endif>
                    <h3>
                        <i @if($key=="0" )class="zmdi zmdi-accounts-alt" @elseif($key=="1" )class="zmdi zmdi-library"
                            @elseif($key=="2" )class="zmdi zmdi-puzzle-piece" @else class="zmdi zmdi-city-alt"
                            @endif></i>
                        {{$processdata->title }}
                    </h3>
                    <p>
                        {{$processdata->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
