<!DOCTYPE html>
<html>
<head>
    <title>Customer Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-blue-700 text-white px-6 py-4 flex justify-between">
    <div class="font-bold">Customer Panel</div>

    <div class="flex gap-4">
        <a href="<?= base_url('customer/'); ?>">Dashboard</a>
        <a href="<?= base_url('customer/videos'); ?>">Video</a>
        <a href="<?= base_url('customer/requests'); ?>">Request Saya</a>
        <a href="<?= base_url('auth/logout'); ?>">Logout</a>
    </div>
</nav>

<main class="p-6">