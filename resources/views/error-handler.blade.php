@if ($errors->any())
    <div class="alert alert-danger border-0 show-sm">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
