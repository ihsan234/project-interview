<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegadaian</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <main style="display: flex; justify-content: center; margin: 8%;">
        <div class="card form-card">
            <h2 style="text-align: center; margin-bottom: 20px;">Login Administrator</h2>
            <form method="POST" action="{{route('authenticate')}}" class="card py-4 px-4">
        @csrf
        @if (Session::get('success'))
             <div class="alert alert-success w-75">
                 {{ Session::get('success') }}
            </div>
            @endif
            @csrf
        @if (Session::get('fail'))
             <div class="alert alert-success w-75">
                 {{ Session::get('fail') }}
            </div>
        @endif
        @if (Session::get('notAllowed'))
             <div class="alert alert-success w-75">
                 {{ Session::get('notAllowed') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
                <div class="input-card">
                    <label for="">Email:</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="input-card">
                    <label for="">Password :</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit">Masuk</button>
                <a href="{{route('index')}}" class="back-btn">Batal</a>
            </form>
        </div>
    </main>
</body>
</html>
