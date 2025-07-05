<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Barang</h2>
    </x-slot>

    <div class="py-4 max-w-xl mx-auto">
        <form action="{{ route('admin.barang.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama_barang" class="block">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label for="kondisi" class="block">Kondisi</label>
                <select name="kondisi" class="w-full border p-2" required>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="kondisi" class="block">Keterangan</label>
                <select name="kondisi" class="w-full border p-2" required>
                    <option value="masih ada">Masih ada</option>
                    <option value="kosong">Kosong</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2">Simpan</button>
        </form>
    </div>
</x-app-layout>
