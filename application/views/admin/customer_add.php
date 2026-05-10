<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Customer</h1>
    <form action="<?= base_url('admin/store_customer'); ?>" method="POST">
        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Username</label>
            <input type="text" name="username" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>Telpon</label>
            <input type="text" name="phone" class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label>Alamat</label>
            <textarea name="address" class="w-full border p-2 rounded" rows="4"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded"> Simpan </button>
        <a href="<?= base_url('admin/customers'); ?>" class="bg-gray-500 text-white px-4 py-2 rounded"> Kembali </a>
    </form>

</div>