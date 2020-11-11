@extends('component.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto" >
            @foreach($contents as $content)
            <div class="post-preview">
                    <h2 class="post-title">
                        {{$content->title}}
                    </h2>
                    <h3 class="post-subtitle" style="word-break: break-all">
                        {{str_limit($content->content, 70)}}
                    </h3>
                </a>
            </div>
            <hr>
        @endforeach
            <!-- Pager -->
        </div>
    </div>
</div>
@endsection
