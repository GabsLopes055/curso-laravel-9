@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    </ul>
@endif()
