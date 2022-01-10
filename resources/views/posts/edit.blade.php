@extends('layouts.default')

@section('content')

    @include('includes.menu')

        <div class="col-lg-8 mx-auto mt-5 pt-5 py-md-5">

            @include('includes.heading')

            <main>

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <form method="POST" action="{{ route('posts.update',$post->id) }}" >
                    @method('PUT')
                    @csrf
                    <div class="col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title goes here" value="{{ $post->title }}">
                    </div>

                    <div class="col-md-12">
                        <label for="title" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
                    </div>

                    <div class="col-md-12">
                        <label for="body" class="form-label">Body</label>
                        <textarea id="editor" name="body" class="form-control" placeholder="Post content goes here">{{ $post->body }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="user_id" class="form-label">User</label>
                        <input class="form-control" name="user_id" value="{{ $post->user_id }}">
                    </div>

                    <div class="col-md-12">
                        <input type="submit" class="btn btn-small btn-primary" value="Update">
                    </div>

                </form>
            </main>

            @include('includes.footer')

        </div>

        {{-- CKEdtior JS --}}
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    editor.editing.view.change(writer=>{
                        writer.setStyle('height', '400px', editor.editing.view.document.getRoot());
                    });
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>

@endsection
