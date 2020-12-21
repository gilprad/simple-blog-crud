@extends('component.template')

@section('headerindex')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('assets/img/home-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Blog</h1>
                        <span class="subheading">Blog UTS</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto" style="word-break: break-all">
                @foreach($contents as $index => $content)
                    <div class="post-preview">
                        <a href="{{ route('blog.show', $index)  }}">
                            <h2 class="post-title">
                                {{$content->title}}
                            </h2>
                            <h3 class="post-subtitle">
                                {{substr($content->content, 0, 70)}}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            {{$content->author}}
                            on {{$content->created_at}}</p>
                    </div>
                    <hr>
            @endforeach
            <!-- Pager -->
            </div>
        </div>
    </div>
@endsection
