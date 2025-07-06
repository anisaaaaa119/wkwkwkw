<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Daftar Barang</h2>
    </x-slot>

    <div class="py-4 max-w-6xl mx-auto">
        <!-- 🔘 Tombol Home ke Dashboard -->
        <div class="flex justify-between mb-4">
            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center gap-2 bg-gray-600 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                </svg>
                Home
            </a>

            <!-- Tombol Tambah Barang -->
            <a href="{{ route('admin.barang.create') }}"
                class="inline-flex items-center gap-2 bg-green-600 text-white font-semibold px-4 py-2 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Barang
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama Barang</th>
                    <th class="p-2 border">Jumlah</th>
                    <th class="p-2 border">Kondisi</th>
                    <th class="p-2 border">Keterangan</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $index => $barang)
                    <tr class="border-b">
                        <td class="p-2 border">{{ $index + 1 }}</td>
                        <td class="p-2 border">{{ $barang->nama_barang }}</td>
                        <td class="p-2 border">{{ $barang->jumlah }}</td>
                        <td class="p-2 border capitalize">{{ $barang->Kondisi }}</td>
                        <td class="p-2 border capitalize">{{ $barang->Keterangan }}</td>
                        <td class="p-2 border space-x-2">
                            <a href="{{ route('admin.barang.edit', $barang->id) }}"
                                class="inline-block bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>

                            <form action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus barang ini?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>