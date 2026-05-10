<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Video</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <?php foreach($videos as $v){ ?>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-bold mb-2"><?= $v->title ?></h2>
            <p class="text-gray-600 mb-4"><?= $v->description ?></p>
            <a href="<?= base_url('access/request/'.$v->id) ?>"class="bg-blue-600 text-white px-4 py-2 rounded"> Request Access </a>
        </div>
        <?php } ?>
    </div>
</div>