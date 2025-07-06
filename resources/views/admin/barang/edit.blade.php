<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Barang</h2>
    </x-slot>

    <div class="py-4 max-w-xl mx-auto">
        <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_barang" class="block">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border p-2" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border p-2" value="{{ old('jumlah', $barang->jumlah) }}" required>
            </div>

            <div class="mb-4">
                <label for="kondisi" class="block">Kondisi</label>
                <select name="kondisi" class="w-full border p-2" required>
                    <option value="baik" {{ old('kondisi', $barang->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ old('kondisi', $barang->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block">Keterangan</label>
                <select name="keterangan" class="w-full border p-2" required>
                    <option value="masih ada" {{ old('keterangan', $barang->keterangan) == 'masih ada' ? 'selected' : '' }}>Masih Ada</option>
                    <option value="kosong" {{ old('keterangan', $barang->keterangan) == 'kosong' ? 'selected' : '' }}>Kosong</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('admin.barang.index') }}" class="text-gray-600 hover:underline">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
