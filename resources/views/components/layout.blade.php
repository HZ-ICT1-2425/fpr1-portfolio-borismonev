<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{
            Request::segment(2)
                ? (Request::segment(3) === 'edit'
                    ? ucwords(str_replace('-', ' ', Request::segment(2))) . ' Edit'
                    : ucwords(str_replace('-', ' ', Request::segment(2))))
                : (Request::segment(1)
                    ? ucwords(str_replace('-', ' ', Request::segment(1)))
                    : 'Home')
        }}
    </title>


    {{-- Compiled assets --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        h1 {
            text-align: center;
        }

        p {
            text-indent: 2rem;
        }

        .footer {
            max-height: 50px;
        }
    </style>
</head>
<body>
{{-- Navigation bar --}}
@include('components.navbar')
{{-- Content --}}
<section class="section is-flex is-flex-direction-column is-fullheight">
    <div class="container">
        <div class="columns">

            <div class="column is-12-tablet">

                <div class="content">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Footer --}}
<footer class="footer" style="text-align: center; font-size: 20px">
    <p> &#169; 2025 Boris Monev
        <a href="https://github.com/borismonev" target="_blank"><i class="fa-brands fa-github"></i></a>
    </p>
</footer>

</body>
</html>
