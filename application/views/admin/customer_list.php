<?php
// var_dump($customer);
?>
<div class="container mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Data Customer</h1>
            <a href="<?= base_url('admin/add_customer'); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"> Tambah Customer </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Username</th>
                        <th class="border px-4 py-2">Telpon</th>
                        <th class="border px-4 py-2">Alamat</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($customers as $customer): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2 text-center">
                            <?= $no++; ?>
                        </td>
                        <td class="border px-4 py-2">
                            <?= $customer->name; ?>
                        </td>
                        <td class="border px-4 py-2">
                            <?= $customer->username; ?>
                        </td>
                        <td class="border px-4 py-2">
                            <?= $customer->phone; ?>
                        </td>
                        <td class="border px-4 py-2">
                            <?= $customer->address; ?>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <a href="<?= base_url('admin/delete_customer/'.$customer->id); ?>" onclick="return confirm('Yakin hapus customer?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm"> Hapus </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>