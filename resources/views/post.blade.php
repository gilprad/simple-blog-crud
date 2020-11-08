@extends('component.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($contents as $content)
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        {{$content->title}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{str_limit($content->content, 70)}}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on September 24, 2019</p>
            </div>
            <hr>
        @endforeach
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
