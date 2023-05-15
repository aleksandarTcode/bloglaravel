@props(['src','width'])

@if (strpos($src , 'http') === 0)
    <img src="{{ $src }}" width={{ $width }} alt="User avatar" class="rounded-xl mt-4">
@else
    <img src="{{ asset('storage/'. $src) }}" width={{ $width }} alt="User avatar" class="rounded-xl mt-4">
@endif
