<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">
        <?= $video->title ?>
    </h1>
    <div class="bg-white p-4 rounded shadow">
        <video width="100%" controls>
            <source src="<?= base_url('uploads/videos/'.$video->file_name) ?>">
        </video>
    </div>
</div>