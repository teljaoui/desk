<header>
    <nav class="header-admin">
        <ul class="ul">
            <li class="logo">
                <a href="/"><span>Desk</span></a>
            </li>
            <li class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Lien court</span><i class="fa-solid fa-link"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="/"><i class="fa-solid fa-list"></i><span>Clients Non
                                Traité</span></a></li>
                    <li><a class="dropdown-item" href="/confirmé"><i
                                class="fa-solid fa-list-check"></i><span>Rendez-vous confirmé</span></a></li>
                    <li><a class="dropdown-item" href="/refusé"><i
                                class="fa-solid fa-circle-xmark"></i><span>Rendez-vous refusé</span></a></li>
                    <li>
                        <a class="dropdown-item" href="/validé">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Rendez-vous Validé</span>
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="/appointments"><i class="fa-solid fa-file-lines"></i><span>Liste
                                des
                                Rendez-vous</span></a></li>
                    @if (session('admin') == 'admin')
                        <li>
                            <a class="dropdown-item" href="/ajouter">
                                <i class="bi bi-file-earmark-plus-fill"></i>
                                <span>Ajouter Client</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/adminmanager">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                <span>Gestion des Admins</span>
                            </a>
                        </li>
                    @endif
                    <li><a class="dropdown-item logout" href="/logout"><i
                                class="bi bi-box-arrow-left"></i><span>Déconnexion({{ Session('admin') }})</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
