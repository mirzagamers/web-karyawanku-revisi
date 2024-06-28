@extends('adminku.app')
@section('title','Edit Slip Gaji')

@section('content')
    <h1 class="h3 left-align mb-4">Edit Slip Gaji</h1>
    <form action="{{ route('updateslipgaji', ['id_gaji' => $slipgaji->id_gaji]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" aria-label="Default select example" required>
                <option value="" selected disabled>Pilih Jabatan</option>
                <option value="Admin" {{ $slipgaji->jabatan === 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Manager" {{ $slipgaji->jabatan === 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Karyawan" {{ $slipgaji->jabatan === 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pendapatan" class="form-label">Pendapatan</label>
            <input type="number" class="form-control" id="pendapatan" name="pendapatan" value="{{ $slipgaji->pendapatan }}" required>
        </div>
        <div class="mb-3">
            <label for="potongan" class="form-label">Potongan</label>
            <input type="number" class="form-control" id="potongan" name="potongan" value="{{ $slipgaji->potongan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
