@extends('dashboard.response.layout')

@section('content')
    <form action="{{ route('dashboard.response.store', $id) }}" method="POST">
        @csrf
        <div class="form-group card p-5 my-5 shadow-lg">
        <h1>Response</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li style="font-weight: bold">{{ $error }}</li>
                @endforeach
            @endif
                @if (Session::get('Succes'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('Succes') }}
                    </div>
                @endif
                <label for="status">Status</label>
                <select name="type" id="status" class="form-select">
                    <option value="" selected disabled>Pilih Status</option>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
                <label for="">Schedule</label>
                <input type="date" name="schedule" id="" class="form-control">
                <div class="d-flex gap-3 my-4">
                    <a href="/data/type" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>

    </form>
@endsection
