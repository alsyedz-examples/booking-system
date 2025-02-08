@extends('layout')

@push('styles') @endpush

@section('content')
    @if($message = session('message'))
        <x-alert type="success">{{ $message }}</x-alert>
    @endif
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <form action="{{ route('contact-us.store') }}" method="post" class="space-y-8">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" id="email" name="email"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                       placeholder="john.doe@example.com" value="{{ old('email') }}" required>
                @error('email')
                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                <input type="text" id="subject" name="subject"
                       class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500"
                       placeholder="Let us know how we can help you" value="{{ old('subject') }}" required>
                @error('subject')
                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
                <textarea id="message" name="message" rows="6"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                          placeholder="Leave a comment..." required>{{ old('message') }}</textarea>
                @error('message')
                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300">Send message</button>
        </form>
    </div>
@endsection

@push('scripts') @endpush
