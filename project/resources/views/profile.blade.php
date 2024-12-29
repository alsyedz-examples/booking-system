@extends('layout')

@push('styles') @endpush

@section('content')
    <div class="min-h-[calc(100vh-128px)] flex justify-center items-center">
        <div class="w-full max-w-screen-md">
            <x-forms.profile/>
        </div>
    </div>
@endsection

@push('scripts') @endpush
