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
    <title>Détails du Client</title>
</head>

<body>
    @include('header')
    <section class="admin my-5 py-5">
        <div class="container my-5">
            <div class="today">
                <h6 class="title">Détails du Client</h6>
                <div>
                    <ul>
                        <div>
                            <li>
                                <span>Nom du Société:</span>
                                <p>{{$client->name}}</p>
                            </li>
                            <li>
                                <span>
                                    Type du Société:</span>
                                <p>{{$client->type}}</p>
                            </li>
                            <li>
                                <span>Prénom:</span>
                                <p>{{$client->first_name}}</p>
                            </li>
                        </div>
                        <div>
                            <li>
                                <span>Nom:</span>
                                <p>{{$client->last_name}}</p>
                            </li>
                            <li>
                                <span>Numéro de Téléphone:</span>
                                <p><a href="tel:{{$client->phone_number}}">{{$client->phone_number}}</a></p>
                            </li>
                            <li>
                                <span>Statu:</span>
                                <p>Traité</p>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="my-2">
                    <iframe
                        src="{{$client->location}}"
                        width="100%" height="200" style="border:0; margin-top:20px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="rendez-vous my-3" id="rendez-vous">
                    <h6 class="title">Rendez-vous</h6>
                    <form action="/admin/updatePost" method="POST">
                        @csrf
                        <div class="item">
                            <div class="form-group">
                                <label for="">Selectioné une date:</label>
                                <input type="date" name="password" class="form-control" id="" required>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="">Selectioné une heure:</label>
                                <input type="time" name="password_confirme" class="form-control" id=""
                                    required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <input type="submit" value="Ajouter" class="submit">
                            <a href="" class="submit bg-danger">Refusé</a>
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
