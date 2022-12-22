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
        <form action="update" method="POST" required>
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= $m_Data[1]; ?>">
        <br><hr>
        <label for="header_title">Header Title:</label>
        <input type="text" name="header_title" id="header_title" value="<?= $m_Data[2]; ?>">
        <br>
        <label for="header_subtitle">Header Subtitle:</label>
        <input type="text" name="header_subtitle" id="header_subtitle" value="<?= $m_Data[4]; ?>">
        <br>
        <label for="header_author">Header Author:</label>
        <input type="text" name="header_author" id="header_author" value="<?= $m_Data[3]; ?>">
        <br>
        <label for="footer_title">Footer Title:</label>
        <input type="text" name="footer_title" id="footer_title" value="<?= $m_Data[5]; ?>">
        <br>
        <label for="footer_subtitle">Footer Subtitle:</label>
        <input type="text" name="footer_subtitle" id="footer_subtitle" value="<?= $m_Data[6]; ?>">
        <br>
    </div>
    <br><hr><br>
    <button type="submit">Apply Changes</button>
</form>
        </div>
    </div>
</x-admin-layout>
