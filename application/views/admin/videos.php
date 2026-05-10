<div class="container mx-auto p-6">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Data Video</h1>
        <a href="<?= base_url('video/add') ?>" class="bg-blue-600 text-white px-4 py-2 rounded">
            Tambah Video
        </a>
    </div>
    <div class="bg-white p-4 rounded shadow">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">No</th>
                    <th class="border p-2">Judul</th>
                    <th class="border p-2">Deskripsi</th>
                    <th class="border p-2">Video</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($videos as $v){ ?>
                <tr>
                    <td class="border p-2 text-center"><?= $no++ ?></td>
                    <td class="border p-2"><?= $v->title ?></td>
                    <td class="border p-2"><?= $v->description ?></td>
                    <td class="border p-2">
                        <video width="200" controls> <source src="<?= base_url('uploads/videos/'.$v->file_name) ?>"> </video>
                    </td>
                    <td class="border p-2 text-center">
                        <a href="<?= base_url('video/delete/'.$v->id) ?>" onclick="return confirm('Hapus video?')" class="bg-red-600 text-white px-3 py-1 rounded"> Hapus </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>