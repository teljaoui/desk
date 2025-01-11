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
                <div>
                    <ul>
                        <button class="btn btn-success hiddenform" onclick="showform()"><i
                                class="fa-solid fa-user-pen"></i></button>
                        <button class="btn btn-warning showform" onclick="hiddenform()"><i
                                class="fa-solid fa-circle-xmark"></i></button>
                    </ul>
                    <form action="{{ route('updateinfoclient') }}" method="post">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <ul>
                            <div>
                                <li>
                                    <span>Nom du Société:</span>
                                    <div>
                                        <p class="hiddenform">{{ $client->name }}</p>
                                        <input type="text" class="form-control showform" name="name"
                                            value="{{ $client->name }}" required>
                                    </div>
                                </li>
                                <li>
                                    <span>Prénom:</span>
                                    <div>
                                        <p class="hiddenform">{{ $client->first_name }}</p>
                                        <input type="text" class="form-control showform" name="first_name"
                                            value="{{ $client->first_name }}" required>
                                    </div>
                                </li>
                                <li>
                                    <span>Nom:</span>
                                    <div>
                                        <p class="hiddenform">{{ $client->last_name }}</p>
                                        <input type="text" class="form-control showform" name="last_name"
                                            value="{{ $client->last_name }}" required>

                                    </div>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <span>
                                        Type du Société:</span>
                                    <div>
                                        <p class="hiddenform">{{ $client->type }}</p>
                                        <input type="text" class="form-control showform" name="type"
                                            value="{{ $client->type }}" required>
                                    </div>
                                </li>
                                <li>
                                    <span>Numéro de Téléphone:</span>
                                    <div>
                                        <p class="hiddenform"><a
                                                href="tel:{{ $client->phone_number }}">{{ $client->phone_number }}</a>
                                        </p>
                                        <input type="text" class="form-control showform" name="phone_number"
                                            value="{{ $client->phone_number }}" required>
                                    </div>
                                </li>
                                <li>
                                    <span>État:</span>
                                    <div>
                                        <p>{{ $client->statut }}</p>
                                    </div>
                                </li>
                            </div>
                        </ul>
                        <div>
                            <button type="submit" class="btn btn-success w-50 mx-auto showform">Update</button>
                        </div>
                    </form>
                </div>
                <div class="my-2">
                    <iframe src="{{ $client->location }}" width="100%" height="200"
                        style="border:0; margin-top:20px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                @if ($client->statut == 'Non Traité')
                    <div class="rendez-vous my-3" id="rendez-vous">
                        <h6 class="title">Rendez-vous</h6>
                        <form action="/appointmentspost" method="POST">
                            @csrf
                            <div class="item">
                                <div class="form-group">
                                    <label for="">Selectioné une date:</label>
                                    <input type="date" name="date" class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="item">
                                <div class="form-group">
                                    <label for="">Selectioné une heure:</label>
                                    <input type="time" name="time" class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="item">
                                <div class="form-group">
                                    <label for="">Commentaire</label>
                                    <textarea name="Commentaire" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-3">
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <input type="submit" value="Ajouter" class="submit">
                                <a href="/refuspost/{{ $client->id }}" class="submit bg-danger refus">Refusé</a>
                            </div>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </section>



    <script src="/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
