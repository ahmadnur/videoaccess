<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Request Access Video</h1>
    <div class="bg-white p-4 rounded shadow">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">No</th>
                    <th class="border p-2">Customer</th>
                    <th class="border p-2">Video</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Start</th>
                    <th class="border p-2">End</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($requests as $r){ ?>
                <tr>
                    <td class="border p-2 text-center"><?= $no++ ?></td>
                    <td class="border p-2"><?= $r->name ?></td>
                    <td class="border p-2"><?= $r->title ?></td>
                    <td class="border p-2"> <?= $r->status ?></td>
                    <td class="border p-2"><?= $r->start_at ?></td>
                    <td class="border p-2"><?= $r->end_at ?></td>
                    <td class="border p-2 text-center">
                        <?php if($r->status == 'pending'){ ?>
                        <a href="<?= base_url('access/approve/'.$r->id) ?>" class="bg-green-600 text-white px-3 py-1 rounded">Approve</a>
                        <a href="<?= base_url('access/reject/'.$r->id) ?>"class="bg-red-600 text-white px-3 py-1 rounded">Reject</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>