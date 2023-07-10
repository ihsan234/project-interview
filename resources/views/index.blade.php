<!DOCTYPE html>
<html lang="en">

<head>
    <title>Website Template Design in HTML & CSS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="assets/img/Logo.png" style="height:80px;"></a>
            </div>
            <div class="menu">
                <ul>
                    @if (Auth::user()->role == 'admin')
                        <li><a class="btn" href="/data">Data</a></li>
                    @elseif(Auth::user()->role == 'petugas')
                        <li><a class="btn" href="/data/response">Data Response</a></li>
                        <li><a class="btn" href="/data/type">Data Type</a></li>
                    @endif
                    @if (Auth::user())
                        <a href="/logout" class="login-btn" style="margin:25px;">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="login-btn" style="margin:25px;">Login</a>
                    @endif
                </ul>
            </div>
            <section class="baris" style="">
                <div class="kolom kolom1">
                    <h2 style="text-align:left;">Interview Kerja</h2>
                    <ol>
                        <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias modi nemo illum beatae omnis
                            fugit!</li>
                        <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur, debitis?</li>
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate eligendi et atque
                            dolores veniam maiores quasi error deserunt ducimus delectus?</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ol>
                </div>
                <div class="kolom kolom2">
                    <img src="assets/img/gwe.png" alt="">
                </div>
            </section>
            <div class="containere">
                <div class=" text-center mt-5 ">
                </div>
                <div class="row" style="width: 1470px;">
                    <div class="card mt- mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                                <div class="controls">
                                    <strong>
                                        <h5>SILAHKAN ISI FORM TERSBUT</h5>
                                    </strong>
                                    <h6>UNTUK MELAKUKAN PENGGADIAN</h6>
                                    <br><br><br><br>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <li style="font-weight: bold">{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    @endif

                                    @if (Session::get('Succes'))
                                        <div class="alert alert-success" role="alert" style="text-align:center;">
                                            {{ Session::get('Succes') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('dashboard') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group mb-3">
                                                    <label class for="form_name"><strong> NAME</strong></label>
                                                    <input id="form_name" type="text" name="nama"
                                                        class="form-control" placeholder="Masukan NAME*"
                                                        required="required" data-error="Firstname is required.">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="form_email"><strong>EMAIL</strong></label>
                                                    <input id="form_email" type="text" name="email"
                                                        class="form-control" placeholder="Please enter your Email*"
                                                        required="required" data-error="Valid email is required.">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="form-group mb-3">
                                                    <label class for="form_name"><strong> AGE</strong></label>
                                                    <input id="form_name" type="number" name="age"
                                                        class="form-control" placeholder="Masukan Nama Age*"
                                                        required="required" data-error="Firstname is required.">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group mb-3">
                                                    <label for="form_email"><strong>PHONE</strong></label>
                                                    <input id="form_email" type="number" name="no_tlp"
                                                        class="form-control" placeholder="Please enter your Number*"
                                                        required="required" data-error="Valid email is required.">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="form_email"><strong>Education Name</strong></label>
                                                    <input id="form_email" type="text" name="education_name"
                                                        class="form-control" placeholder="Please enter your NIK*"
                                                        required="required" data-error="Valid email is required.">
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="form_need"><strong>Last_Education*</strong></label>
                                        <select id="form_need" name="last_education" class="form-control"
                                            required="required" data-error="Please specify your need.">
                                            <option value="" selected disabled>--Select Your Last Education--
                                            </option>
                                            <option>SMK</option>
                                            <option>SMA</option>
                                            <option>Universitas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-card">
                                    <label for="">ITEM PHOTO</label>
                                    <input type="file" name="cv_file">
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"
                                        style="padding: 35px; margin: 15px;"value="Send Message">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>
