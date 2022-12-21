@extends ('layout')

@section('title')
    <title>subscribe to newsletter</title>
@endsection

@section('content')
    <section class="px-6 py-8 border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">
        <form action="/newsletter" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">mail address</label>
                <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button
                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5"
                type="submit">Subscribe</button>
        </form>
    </section>
@endsection
