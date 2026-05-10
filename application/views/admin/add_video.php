<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Tambah Video</h1>

    <div class="bg-white p-4 rounded shadow">

        <form action="<?= base_url('video/store') ?>" method="POST" enctype="multipart/form-data">

            <div class="mb-4">
                <label>Judul Video</label>

                <input type="text" name="title" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Deskripsi</label>

                <textarea name="description" class="w-full border p-2 rounded" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label>File Video</label>

                <input type="file" name="video" class="w-full border p-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>

            <a href="<?= base_url('video') ?>" class="bg-gray-500 text-white px-4 py-2 rounded">
                Kembali
            </a>

        </form>

    </div>

</div>