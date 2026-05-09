<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-gray-900 text-white px-6 py-4 flex justify-between">
    <div class="font-bold">Admin Panel</div>

    <div class="flex gap-4">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
        <a href="<?= base_url('admin/customers'); ?>">Customer</a>
        <a href="<?= base_url('video'); ?>">Video</a>
        <a href="<?= base_url('access'); ?>">Request</a>
        <a href="<?= base_url('auth/logout'); ?>">Logout</a>
    </div>
</nav>

<main class="p-6">