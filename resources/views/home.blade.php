@extends ('layout')

<?php
$m_Singleton = App\Http\Controllers\Admin\Settings::getInstance();

$m_Data = $m_Singleton->getData();
?>

@section('title')
    <title><?= $m_Data[1] ?></title>
@endsection

@section('content')

    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-8">


            <header class="max-w-xl mx-auto mt-20 text-center">
                <h1 class="text-4xl">
                    <?= $m_Data[2] ?>
                </h1>

                <h2 class="inline-flex mt-2"><?= $m_Data[4] ?> <img src="/assets/img/lary-head.svg"
                        alt="Head of Lary the mascot"></h2>

                <p class="text-sm mt-14">
                    <?= $m_Data[3] ?>
                </p>

                <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                    <!--  Category -->
                    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                        <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                            <option value="category" disabled selected>Category
                            </option>
                            <option value="personal">Personal</option>
                            <option value="business">Business</option>
                        </select>

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                            height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </div>

                    <!-- Other Filters -->
                    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                        <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                            <option value="category" disabled selected>Other Filters
                            </option>
                            <option value="foo">Foo
                            </option>
                            <option value="bar">Bar
                            </option>
                        </select>

                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                            height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </div>

                    <!-- Search -->
                    <!-- Search -->
                    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                        <form method="GET" action="{{ route('search') }}" class="flex">
                            <input type="text" name="value"
                                placeholder="Find something"class="bg-transparent font-semibold text-sm focus:outline-none"
                                value="@if (strlen(request()->get('value')) > 0) {{ request()->get('value') }} @endif" />
                            <select id="category" name="category"
                                class="rounded-xl text-sm focus:outline-none bg-transparent cursor-pointer">
                                <option value="everything" @if (request()->get('category') == 'everything' || request()->get('category') == '') selected @endif>Everything
                                </option>
                                <option value="title" @if (request()->get('category') == 'title') selected @endif>Title</option>
                                <option value="author" @if (request()->get('category') == 'author') selected @endif>Author</option>
                                <option value="body" @if (request()->get('category') == 'body') selected @endif>Body</option>
                            </select>
                        </form>
                        {{-- <span class="text-red-700 text-xs">The value is required for searching</span> --}}
                    </div>
                </div>
            </header>
            <div class="test"></div>
            <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
                @foreach ($posts as $post)
                    <article
                        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                        <div class="py-6 px-5 lg:flex ">
                            <div class="flex-1 lg:mr-8">
                                <img src="/assets/img/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                            </div>

                            <div class="flex-1 flex flex-col justify-between">
                                <header class="mt-8 lg:mt-0">
                                    <div class="space-x-2">
                                        <a href="#"
                                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                            style="font-size: 10px">Techniques</a>

                                        <a href="#"
                                            class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                            style="font-size: 10px">Updates</a>
                                    </div>

                                    <div class="mt-4">
                                        <h1 class="text-3xl">
                                            {{ $post->title }}
                                        </h1>

                                        <span class="mt-2 block text-gray-400 text-xs">
                                            Published <time>{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}</time>
                                        </span>
                                    </div>
                                </header>

                                <div class="text-sm mt-2">
                                    {{ $post->excerpt }}
                                </div>

                                <footer class="flex justify-between items-center mt-8">
                                    <div class="flex items-center text-sm">
                                        <img src="/assets/img/lary-avatar.svg" alt="Lary avatar">
                                        <div class="ml-3">
                                            <h5 class="font-bold">Lary Laracore</h5>
                                            <h6>Mascot at Laracasts</h6>
                                        </div>
                                    </div>

                                    <div class="hidden lg:block">
                                        <a href="/posts/{{ $post->slug }}"
                                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                                            More</a>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </article>
                @endforeach
                {{ $posts->links('pagination::tailwind') }}

            </main>

            <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="/assets/img/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
                <h5 class="text-3xl"><?= $m_Data[5] ?></h5>
                <p class="text-sm mt-3"><?= $m_Data[6] ?></p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                        <form method="POST" action="#" class="lg:flex text-sm">
                            <div class="lg:py-3 lg:px-5 flex items-center">
                                <label for="email" class="hidden lg:inline-block">
                                    <img src="/assets/img/mailbox-icon.svg" alt="mailbox letter">
                                </label>

                                <input id="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                            </div>

                            <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </footer>
        </section>
        @if (session()->has('success'))
            <div class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </body>
@endsection
