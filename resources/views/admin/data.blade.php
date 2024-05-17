<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('DATA PENDAFTARAN MAHASISWA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("DATA PENDAFTARAN MAHASISWA") }} --}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr style="text-align: center;">
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Alamat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No Telepon
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Program Studi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Persetujuan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                        style="text-align: center;">
                                        <td class="px-6 py-4">
                                            {{ $item->nama_mhs }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->alamat_mhs }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->no_telp }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($item->prodi == 'ti')
                                                <span>D3 Teknik Informatika</span>
                                            @elseif ($item->prodi == 'tm')
                                                <span>D3 Teknik Mesin</span>
                                            @elseif ($item->prodi == 'te')
                                                <span>D3 Teknik Elektronika</span>
                                            @elseif ($item->prodi == 'tl')
                                                <span>D3 Teknik Listrik</span>
                                            @elseif ($item->prodi == 'rpl')
                                                <span>D4 Rekayasa Perangkat Lunak</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($item->status == 'menunggu')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Menunggu
                                                </span>
                                            @elseif ($item->status == 'diterima')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Diterima
                                                </span>
                                            @elseif ($item->status == 'ditolak')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Ditolak
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('update.status') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" name="status" value="diterima"
                                                    class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">TERIMA</button>
                                            </form>
                                            <form action="{{ route('update.status') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" name="status" value="ditolak"
                                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">TOLAK</button>
                                            </form>
                                            <form action="{{ route('admin.hapus') }}" method="POST" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit"
                                                    class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
