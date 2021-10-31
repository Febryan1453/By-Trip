<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{url('asset/ict.png')}}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>{{$title ?? 'Beranda - By Trip'}}</title>
</head>

<style>
    @media (max-width: 600px) {
        .jarak {
            padding-top: 40px;
            padding-bottom: 100px;
        }
    }

    .ancor {
        text-decoration: none;
        color: black;
    }

    .card {
        border: none;
    }

    .card:hover {
        color: black;
        /* box-shadow: 5px 10px #474a4ecf; */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .latar {
        background: linear-gradient(90deg, #F6F8FD 29px, transparent 1%) center, linear-gradient(#F6F8FD 29px, transparent 1%) center, #bfc5d3;
        background-size: 30px 30px;
    }

    .gambar {
        width: 80px !important;
        padding-top: 100px;
        padding-bottom: 30px;
    }

    .scroll {
        overflow-y: hidden;
    }

    .scroll-modal {
        height: 450px;
        overflow-x: hidden;
    }
</style>

<body class="container latar">
    <div class="text-center">
        <a href="{{route('landing.index')}}">
            <img class="gambar" src="{{url('asset/ict-juara.png')}}" alt="Logo-brand">
        </a>
    </div>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>