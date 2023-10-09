@extends('dashboard.app')

@section("title") Add Site @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Site " => route("site.index"),
    ]])
        @slot("last") Add Site @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Site @endslot
                @slot('button')
                    <a href="{{route('site.index')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('site.store') }}">
                    @csrf
            
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
            
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" class="form-control" id="details" required></textarea>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Add Site</button>
                </form>

                    @endslot
            @endcomponent
        </div>
       
                      

    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 140,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true
            });



        });
    </script>
@endsection
