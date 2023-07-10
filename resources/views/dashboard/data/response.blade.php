@extends('dashboard.data.layout')

@section('content')
    <p style="text-align:center; font-weight: bold; font-size:25px;">Laporan Interview</p>
    <div class="menu" style="text-align:center">
        <a class="btn" href="{{route('data.type')}}">Type</a>
        <a class="btn" href="{{ route('index') }}">Home</a>
        <a class="btn" href="/logout">Log-Out</a>
    </div>
    <div class="d-flex justify-content-center gap-3 mt-3">
        <form action="" class="d-flex" method="GET">
            @csrf
            {{-- menggunakan method GET karna route unutk masuk ke halaman data ini menggunakan ::get --}}
                <input style="width: 200px" class="form-control" type="text" name="search" placeholder="Cari berdasarkan nama...">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a class="btn btn-primary" href="{{ route('data.response') }}">Refresh</a>

        </form>
        {{-- refresh balik lagi ke route data karna nanti pas di kluk refresh mau bersihin riwayat pencarian
         sebelumnya dan balikin lagi nya ke halaman data lagi --}}
    </div>
    <div>
        <table class="table table-responsive table-primary table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Last Education</th>
                    <th>Education Name</th>
                    <th>CV</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @php
                    $no = 1;
                @endphp
                @foreach ($interviews as $item)
                @if (!$item->response)

                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['age'] }}</td>
                    @php
                        $tlp = substr_replace($item->no_tlp, '62', 0, 1);
                    @endphp
                    @php
                        if ($item->response) {
                            $PesanWA = 'hallo' . $item->nama . ' ! pengaduan anda ' . $item->response['status'] . '.Berikut pesan untuk anda :' . $item->response['pesan'];
                        } else {
                            $PesanWA = 'Pengaduan anda';
                        }
                    @endphp
                    <td><a href="https://wa.me/{{ $tlp }}?text={{ $PesanWA }}"
                            target="_blank">{{ $tlp }}</a></td>
                    <td>{{ $item['last_education'] }}</td>
                    <td>{{ $item['education_name'] }}</td>
                    <td><a href="../assets/image/{{ $item->cv_file }}" target="_blank">
                            <img src="{{ asset('assets/image/' . $item->cv_file) }}" style="height:100px; width:200px">
                    </td>
                    <td>
                        <a href="{{ route('dashboard.response.index', $item['id']) }}" class="btn btn-primary">Send
                            Response</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    @endsection
