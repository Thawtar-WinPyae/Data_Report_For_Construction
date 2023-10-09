@extends('dashboard.author')

@section("title") Add Order @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "User " => route("manager.getOrder"),
    ]])
        @slot("last") Add Order @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Order @endslot
                @slot('button')
                    <a href="{{route('manager.getOrder')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('manager.storeOrder') }}">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="item_id">Item</label>
                        <select name="item_id" class="form-control" id="item_id" required>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="count">Count</label>
                        <input type="number" name="count" value="" class="form-control" id="count" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" disabled name="date" class="form-control" id="date" value="{{ now()->toDateString() }}" required>
                    </div>        
                    <button type="submit" class="btn btn-primary">Create Order</button>
                    @endslot
                </form>
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
