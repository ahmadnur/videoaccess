<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Approve Access</h1>
    <div class="bg-white p-4 rounded shadow">
        <form action="<?= base_url('access/update_approve/'.$request->id) ?>" method="POST">
            <div class="mb-4">
                <label>Customer</label>
                <input type="text" value="<?= $request->name ?>" class="w-full border p-2 rounded bg-gray-100" readonly>
            </div>
            <div class="mb-4">
                <label>Video</label>
                <input type="text" value="<?= $request->title ?>" class="w-full border p-2 rounded bg-gray-100" readonly>
            </div>

            <div class="mb-4">
                <label>Start Access</label>
                <input type="datetime-local" name="start_at" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label>End Access</label>
                <input type="datetime-local" name="end_at" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Approve</button>
            <a href="<?= base_url('access') ?>" class="bg-gray-500 text-white px-4 py-2 rounded"> Kembali </a>
        </form>
    </div>
</div>