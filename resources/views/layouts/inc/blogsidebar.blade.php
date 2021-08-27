<div class="blog-sidebar">

    <div class="blog__recent">
        <h4 class="title-sidebar">
            Recent Post
        </h4>

        @foreach($blogsall['blogrecent'] as $data2)

        <div class="blog__recent-item clearfix">
            <div class="img pull-left">
                <a href="{{ url('inspirations/'.$data2->id) }}">
                    <img alt="{{ $data2->title}}" src="{{ url('uploads/blog/'.$data2->blogpic) }}">
                </a>
            </div>
            <div class="text">
                <h6>
                    <a href="{{ url('inspirations/'.$data2->id) }}">
                        {{ $data2->title}}
                    </a>
                </h6>
                <p>
                    <em>{{date("F j, Y", strtotime($data2->created_at))}}
                    </em>
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <ul class="blog__cate ul--no-style">
        <h4 class="title-sidebar">
            category
        </h4>


        @foreach($blogsall['blogcategory'] as $data)
        <li>
            <a href="{{ url('inspirations/cat-'.$data->id) }}">{{ $data->blog_cat_title }}<span>
                    <em>({{$data->categories->count() }} posts)</em>
                </span></a>
        </li>
        @endforeach



    </ul>

</div>
