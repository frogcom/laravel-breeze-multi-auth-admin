<?php
$m_Singleton = App\Http\Controllers\Admin\Settings::getInstance();

$m_Data = $m_Singleton->getData();
?>

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="bg-white px-6 py-8 p-6 sm:rounded-lg" action="update" method="POST" required>
                        @csrf
                        <div class="flex-1">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" value="<?= $m_Data[1]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <br>
                        <div class="flex-1">
                            <label for="header_title">Header Title:</label>
                            <input type="text" name="header_title" id="header_title" value="<?= $m_Data[2]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex-1">
                            <label for="header_subtitle">Header Subtitle:</label>
                            <input type="text" name="header_subtitle" id="header_subtitle" value="<?= $m_Data[3]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex-1">
                            <label for="header_author">Header Author:</label>
                            <input type="text" name="header_author" id="header_author" value="<?= $m_Data[4]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <br>
                        <div class="flex-1">
                            <label for="footer_title">Footer Title:</label>
                            <input type="text" name="footer_title" id="footer_title" value="<?= $m_Data[5]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="flex-1">
                            <label for="footer_subtitle">Footer Subtitle:</label>
                            <input type="text" name="footer_subtitle" id="footer_subtitle" value="<?= $m_Data[6]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <br>
                        <button type="sumbit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Apply Changes</button>           
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
