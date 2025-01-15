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
    <title>Desk</title>
</head>

<body>
    @include('header')

    <section class="admin my-5 py-5">
        <div class="container">
            <div class="container my-5 w-75">
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
            <div class="today">
                <h6 class="title">
                    Tout les clients
                    @isset($statut)
                        {{ $statut }}
                    @endisset
                </h6>
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                @isset($statut)
                                @if ($statut == 'confirmé' || $statut == 'validé')
                                    <th>code</th>
                                @endif
                            @endisset
                            <th>Société</th>
                            <th class="phonetable">type</th>
                            <th>Nom</th>
                            <th class="phonetable">Prénom</th>
                            <th class="phonetable">Statut</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                @isset($statut)
                                    @if ($statut == 'confirmé' || $statut == 'validé')
                                        <td>{{ $client->id }}</td>
                                    @endif
                                @endisset
                                <td>{{ $client->name }}</td>
                                <td class="phonetable">{{ $client->type }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td class="phonetable">{{ $client->first_name }}</td>
                                <td class="phonetable">{{ $client->statut }}</td>
                                <td>{{ $client->phone_number }}</td>
                                <td><a href="details/{{ $client->id }}"
                                        class="btn btn-info border-0 fw-bold text-white">Détails</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
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
