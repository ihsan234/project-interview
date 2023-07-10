@extends('dashboard.data.layout')

@section('content')
    <p style="text-align:center; font-weight: bold; font-size:25px;">Laporan Interview</p>
    <div class="menu" style="text-align:center">
        <a class="btn" href="{{route('data.response')}}">Response</a>
        <a class="btn" href="{{ route('index') }}">Home</a>
        <a class="btn" href="/logout">Log-Out</a>

    </div>
    <div>
        <form action="" class="d-flex" method="GET">
            @csrf
            {{-- menggunakan method GET karna route unutk masuk ke halaman data ini menggunakan ::get --}}
            <select name="search" id="" class="form-select" style="width: 200px">
                <option value="diterima">diterima</option>
                <option value="ditolak">ditolak</option>
            </select>
            <button type="submit" class="btn btn-primary">Cari</button>
            <a class="btn btn-primary" href="{{ route('data.type') }}">Refresh</a>

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
                    <th>Status</th>
                    <th>Schedule</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                @php
                    $no = 1;
                @endphp
                @foreach ($interviews as $item)
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
                            @if ($item->response)
                                {{ $item->response['type'] }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($item->response['type'] == 'ditolak')
                                -
                            @else
                                {{ \Carbon\Carbon::parse($item->response['schedule'])->format('j F Y') }}
                            @endif
                        </td>
                        <td>
                            @if ($item['response'])
                                <a href="{{ route('dashboard.response.edit', $item->id) }}" class="btn btn-primary">Change
                                    Response</a>
                            @else
                                <a href="{{ route('dashboard.response.index', $item['id']) }}" class="btn btn-primary">Send
                                    Response</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
