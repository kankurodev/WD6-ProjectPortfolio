<header class="container-fluid mb-3">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark rounded-bottom font-weight-bold">
        <a class="navbar-brand pb-2 text-white">Student Grade Report</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('grades')? 'active': '' }}" href="{{ action('GradesController@index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('grades/create')? 'active': '' }}" href="{{ action('GradesController@create') }}">Add Grade</a>
                </li>
            </ul>
        </div>
    </nav>
</header>