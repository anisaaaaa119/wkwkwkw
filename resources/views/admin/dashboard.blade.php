<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Dashboard Admin</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded shadow text-center">
            <h3 class="text-lg font-semibold text-gray-600">Total Barang</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalBarang }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
            <h3 class="text-lg font-semibold text-gray-600">Barang Baik</h3>
            <p class="text-3xl font-bold text-green-600">{{ $barangBaik }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow text-center">
            <h3 class="text-lg font-semibold text-gray-600">Barang Rusak</h3>
            <p class="text-3xl font-bold text-red-600">{{ $barangRusak }}</p>
        </div>

    </div>
<!-- 🔘 Tombol ke Daftar Barang -->
<div class="mt-8 text-center">
    <a href="{{ route('admin.barang.index') }}"
       class="inline-block bg-blue-400 text-white px-6 py-2 rounded shadow hover:bg-blue-500 transition duration-200">
        ➕ Lihat Daftar Barang
    </a>
</div>
    </div>
</x-app-layout>
