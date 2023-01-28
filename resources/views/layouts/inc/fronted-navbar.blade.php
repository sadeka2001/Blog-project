<div class=global-navbar bg-white>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" width="50px" alt="logo">

            </div>

            <div class="col-md-9 my-auto">
                <div class="bordre text-center p-2">
                <h5>Advertise here</h5>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="sticky-top">

 <nav class="navbar navbar-expand-lg navbar-success bg-success">
        <div class="container">

            <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">

            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" width="50px" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ '/' }}">Home</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>



                    @php
                        $category = App\Models\categories::where('navber_status', '0')
                            ->where('status', '0')
                            ->get();

                    @endphp

                    @foreach ($category as $cateitem)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ url('turorials/' . $cateitem->slug) }}">{{ $cateitem->name }}</a>
                        </li>
                    @endforeach

<li>
    <a href="{{ route('logout') }}" class="nav-link btn-danger"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
    </a>
    <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
        @csrf
    </form>
</li>

                </ul>
            </div>
        </div>
    </nav>
</div>
</div>


