<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Request Saya</h1>
    <table class="w-full border">
        <tr class="bg-gray-100">
            <th class="border p-2">No</th>
            <th class="border p-2">Video</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Start</th>
            <th class="border p-2">End</th>
            <th class="border p-2">Aksi</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach($requests as $r){ ?>
        <tr>
            <td class="border p-2 text-center"><?= $no++ ?></td>
            <td class="border p-2"><?= $r->title ?></td>
            <td class="border p-2"><?= $r->status ?></td>
            <td class="border p-2"><?= $r->start_at ?></td>
            <td class="border p-2"><?= $r->end_at ?></td>
            <td class="border p-2 text-center">
                <?php if($r->status == 'approved' && date('Y-m-d H:i:s') >= $r->start_at && date('Y-m-d H:i:s') <= $r->end_at){ ?>
                    <a href="<?= base_url('video/watch/'.$r->video_id) ?>" class="bg-blue-600 text-white px-3 py-1 rounded">Tonton</a>
                <?php }else{ ?>
                    -
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>