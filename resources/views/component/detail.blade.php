@extends('component.template')

@section('headerindex')
    <header class="masthead" style="background-image: url('{{asset('assets/img/post-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $content->title  }}</h1>
                        <span class="meta">Posted by {{ $content->author  }}
              on {{ $content->created_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $content->content !!}
                </div>
            </div>
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="{{ route('blog.edit', $content->id) }}">Edit</a>
                <input type="submit" class="btn btn-danger float-right" form="deleteartikel" role="button" href="{{ route('blog.destroy', $content->id) }}" value="DELETE">
            </div>
        </div>
    </article>

    <form action="{{ route('blog.destroy', $content->id) }}" id="deleteartikel" method="POST">
        @method('DELETE')
        @csrf
    </form>
@endsection
