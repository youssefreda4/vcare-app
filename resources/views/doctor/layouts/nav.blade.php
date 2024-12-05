<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('doctor.appointment.view') }}">{{ auth()->guard('doctor')->user()->name }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('doctor.appointment.view') }}">Home</a>
                </li>
                
                <li class="nav-item">
                    <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
