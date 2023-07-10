<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Export</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
    td, th {
        border: 1px solid black;
    }
</style>

</head>
<body>
    <div class="">
        <table class="table table-bordered table-responsive" style="border: 1px solid black">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Last Education</th>
                    <th>Education Name</th>
                    <th>Status</th>
                    <th>Schedule</th>

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
                        <td>{{ $item['no_tlp'] }}</td>
                        <td>{{ $item['last_education'] }}</td>
                        <td>{{ $item['education_name'] }}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
