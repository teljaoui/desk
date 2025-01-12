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
                <h6 class="title">Liste des Admins</h6>
                <div class="table-responsive dataview">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="d-flex">
                                        <form action="/updatepassword" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $admin->id }}">
                                            <button type="submit" class="btn btn-info border-0 fw-bold text-white"><i
                                                    class="fa-solid fa-pen-nib"></i></button>
                                        </form>

                                        <a href="/deleteadmin/{{ $admin->id }}"
                                            class="btn btn-danger delete border-0 fw-bold text-white mx-1">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (!session('adminadd'))
                        <div>
                            <form action="/ajouteradmin" method="POST">
                                @csrf
                                <button class="btn btn-primary">Ajouter un admin</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            @if (session('adminup'))
                <div class="today my-2">
                    <h6 class="title">Changer le mot de passe du {{ session('adminup') }}</h6>
                    <a href="/updatepasswordreset" class="btn btn-warning"><i class="fa-solid fa-circle-xmark"></i></a>
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
                        <form action="/updatePost" method="POST">
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
            @endif

            @if (session('adminadd'))
                <div class="today my-2">
                    <h6 class="title">Ajouter un admin</h6>
                    <a href="/addadminreset" class="btn btn-warning"><i class="fa-solid fa-circle-xmark"></i></a>
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
                        <form action="/addadminPost" method="POST">
                            @csrf
                             <div class="item">
                                <div class="form-group">
                                    <label for="">Nom et prenom:</label>
                                    <input type="text" name="name" class="form-control" id="" required>
                                </div>
                            </div>
                             <div class="item">
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="text" name="email" class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="item">
                                <div class="form-group">
                                    <label for="">Mot de passe:</label>
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
                                <input type="submit" value="Ajouter" class="submit w-50">
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script src="/main.js"></script>
    <script>
        document.querySelectorAll('.delete').forEach(function(element) {
            element.addEventListener("click", function(event) {
                if (!confirm("Êtes-vous sûr de supprimer cet admin ?")) {
                    event.preventDefault();
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
