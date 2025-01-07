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
    <title>Changer le mot de passe</title>
</head>

<body>
    @include('header')
    <section class="admin my-5 py-5">
        <div class="container my-5">
            <div class="today">
                <h6 class="title">Changer le mot de passe</h6>
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
                    <form action="/admin/updatePost" method="POST">
                        @csrf
                        <div class="item">
                            <div class="form-group">
                                <label for="">Nouveau mot de passe:</label>
                                <input type="text" name="password" class="form-control" id="" required>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="">Confirmer le mot de passe :</label>
                                <input type="text" name="password_confirme" class="form-control" id=""
                                    required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <input type="submit" value="Modifié" class="submit w-50">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
