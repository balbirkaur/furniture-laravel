<!-- Top Contact -->
<section class="top-contact">
    <div class="container clearfix">
        <div class="top-contact--left pull-left">
            <span>
                Gmail:
                <a href="mailto:info@newvocustom.com">info@newvocustom.com</a>
            </span>
            <span>
                Toll free : <a href="tel:603-689-4557">603-689-4557</a>
            </span>
        </div>
        <div class="top-contact--right pull-right">
            @if(!empty($data['settings'][0]->facebook_link))
            <a href="{{$data['settings'][0]->facebook_link }}" target="_blank">
                <i class="zmdi zmdi-facebook"></i>
            </a>
            @endif
            @if(!empty($data['settings'][0]->instagram_link))
            <a href="{{$data['settings'][0]->instagram_link }}" target="_blank">
                <i class="zmdi zmdi-instagram"></i>
            </a>
            @endif
            @if(!empty($data['settings'][0]->dribble_link))
            <a href="{{$data['settings'][0]->dribble_link }}" target="_blank">
                <i class="zmdi zmdi-dribbble"></i>
            </a>
            @endif
            @if(!empty($data['settings'][0]->google_link))
            <a href="{{$data['settings'][0]->google_link }}" target="_blank">
                <i class="zmdi zmdi-google"></i>
            </a>
            @endif
            @if(!empty($data['settings'][0]->twitter_link))
            <a href="{{$data['settings'][0]->twitter_link }}" target="_blank">
                <i class="zmdi zmdi-twitter"></i>
            </a>
            @endif
        </div>
    </div>
</section>
<!-- End Top Contact -->
