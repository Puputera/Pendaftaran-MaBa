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
                                <tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->id }}
                                        </th>
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
