<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Ajouter Client</title>
</head>

<body>
    @include('header')
    <section class="admin my-5 py-5">
        <div class="container my-5">
            <div class="today">
                <h6 class="title">Ajouter Client</h6>
                <div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <form action="/add" method="POST">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <div class="row my-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Nom du Société: </label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Prénom: </label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Nom: </label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Téléphone: </label>
                                    <input type="number" class="form-control" name="phone_number" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Type du Société: </label>
                                    <input type="text" class="form-control" name="type" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Location: </label>
                                    <input type="text" class="form-control" name="location" required>
                                    @error('location')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <input type="submit" value="Suivant" class="w-50 submit">
                    </div>
                </form>

            </div>
        </div>
    </section>

    <script src="/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
