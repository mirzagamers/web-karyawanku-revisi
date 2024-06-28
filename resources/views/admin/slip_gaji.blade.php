@extends('adminku.app')
@section('title', 'Slip Gaji')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 left-align mb-4">Slip Gaji</h1>
    <a href="{{ route('tambahslipgaji') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped text-center"> <!-- Tambahkan kelas text-center di sini -->
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Gaji</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Pendapatan</th>
                <th scope="col">Potongan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data slip gaji -->
            @foreach ($slipgaji as $gaji)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gaji->id_gaji }}</td>
                    <td>{{ $gaji->jabatan }}</td>
                    <td>{{ $gaji->pendapatan }}</td>
                    <td>{{ $gaji->potongan }}</td>
                    <td>
                        <a href="{{ route('editslipgaji', ['id_gaji' => $gaji->id_gaji]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('slipgaji.destroy', $gaji->id_gaji) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus slip gaji ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
