@extends('layouts.default')

@section('content')

    @include('includes.menu')

        <div class="col-lg-8 mx-auto mt-5 pt-5 py-md-5">

            @include('includes.heading')

            <main>

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif

                <form method="POST" action={{ route('posts.store') }}>
                    @csrf
                    <div class="col-md-12">
                        <label for="title" class="form-label"><strong>Title</strong></label>
                        <input type="text" name="title" class="form-control" placeholder="Title goes here">
                    </div>

                    <div class="col-md-12">
                        <label for="title" class="form-label">Slug</label>
                        <input type="text" class="form-control" placeholder="Slug will be generated automatically when saved." disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="body" class="form-label">Body</label>
                        <textarea id="editor" name="body" class="form-control" placeholder="Post content goes here"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="categories" class="form-label">Categories</label>
                        {{-- We keep this hidden so only the Tagin rendered field displays --}}
                        <input class="form-control categories-tagin" name="categories" hidden>
                        <small id="categoriesHelp" class="form-text text-muted">Each new category is comma (,) seperated eg. category1,category2,etc. </small>
                    </div>

                    <div class="col-md-12">
                        <label for="tags" class="form-label">Tags</label>
                        {{-- We keep this hidden so only the Tagin rendered field displays --}}
                        <input class="form-control tags-tagin" name="tags" hidden>
                        <small id="tagsHelp" class="form-text text-muted">Each new tag is comma (,) seperated eg. tag1,tag2,etc. </small>
                    </div>

                    {{-- Todo: Change this to a drop down --}}
                    <div class="col-md-12">
                        <label for="user_id" class="form-label">User</label>
                        <input class="form-control" name="user_id" value="1">
                    </div>

                    <div class="col-md-12">

                        <button type="submit" class="btn btn-small btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                            </svg>
                            Save Post
                        </button>

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

        {{-- Bootstrap Tagin --}}
        <script src="https://unpkg.com/tagin@2.0.2/dist/tagin.min.js"></script>

        <script>
            new Tagin(document.querySelector('.categories-tagin'))
            new Tagin(document.querySelector('.tags-tagin'))
        </script>

@endsection