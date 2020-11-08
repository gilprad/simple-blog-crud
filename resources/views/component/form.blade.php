@extends('component.template')

@section('content')
    <header class="masthead" style="background-image: url('{{asset('assets/img/post-sample-image.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Post Something!</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form name="sentMessage" id="contactForm" action="{{route('blog.store')}}" method="POST">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Author" id="author" required data-validation-required-message="Please enter your name as author.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title of your content" name="title" required data-validation-required-message="Please enter the title">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Content</label>
                        <textarea rows="5" class="form-control" placeholder="Content" name="content" required data-validation-required-message="Please enter a content."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
