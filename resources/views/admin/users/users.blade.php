<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <a href="/admin/posts/create"
                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-5">create
                Post</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center">
                                        <thead class="border-b bg-gray-50">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                    Id
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                    user name
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                    email
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                    created at
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                    Edit
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                    Delete
                                                </th>
                                            </tr>
                                        </thead class="border-b">
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr class="bg-white border-b">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $user->id }}</td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                                        {{ $user->email }}

                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $user->created_at }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <a href="posts/{{ $user->id }}/edit"
                                                            class="text-blue-500 hover:text-blue-600">Edit</a>
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <form action="posts/{{ $user->id }}" method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="text-xs text-gray-400">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr class="bg-white border-b">
                                            @endforeach
                                            {{ $users->links() }}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
