@extends('adminku.app')
@section('title','permohonan cuti')

@section('content')
    <div class="container">
    <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cuti as $cuti)
                                    <tr>
                                        <td>{{ $cuti->nama }}</td>
                                        <td>{{ $cuti->keterangan }}</td>
                                        <td>{{ $cuti->tanggal_mulai }}</td>
                                        <td>{{ $cuti->tanggal_selesai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        <div class="row justify-content-center">
            <div class="col-md-8">
                
            </div>
        </div>
    </div>
@endsection
