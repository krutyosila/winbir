<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WinBir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shantell+Sans:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            background: #111 url('{{ asset('bg.jpg') }}') no-repeat center;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
<div class="content bg">
    <div class="content text-center text-white d-flex align-items-center justify-content-center"
         style="background: url('{{ asset('logo.png') }}') no-repeat center top">
        <div class="container">
            <h3 class="pt-3">Mükemmel Hizmet</h3>
            <h5 class="text-white-50">Sizde memnuniyetinizi oylayabilirsiniz.</h5>
            <div class="py-4">
                <div id="rating" data-rating="{{ $data['yours'] }}"></div>
            </div>
            <div class="py-4 text-white-50">
                <p>
                    <b class="text-white" id="total">{{ number_format($data['total']) }}</b> kullanıcı oyu
                </p>
                <p>
                    <b class="text-white" id="avg">%{{ $data['avg'] }}</b> müşteri memnuniyeti.
                </p>
            </div>
            <div class="pt-3">
                <a href="" class="btn btn-lg btn-danger border border-danger">WINBIR GİRİŞ</a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('rating.star.js') }}"></script>
<script>
    $(document).ready(function () {
        let update = function (response) {
            $('#avg').html('%' + response.avg);
            $('#total').html(response.total);
        };
        let rate = function (rate) {
            $.post('{{ route('rate') }}', {rate: rate, _token: $('meta[name="csrf-token"]').attr('content')}, update);
        };
        $.get('{{ route('avg') }}', update);

        $("#rating").starRating({
            totalStars: 5,
            starShape: 'rounded',
            starSize: 64,
            useGradient: false,
            minRating: 1,
            callback: function (currentRating, $el) {
                console.log(currentRating);
                rate(currentRating);
            }
        });
    });
</script>
</body>
</html>
