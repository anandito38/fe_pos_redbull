@extends('layout')
@section('content')

@php
    function getBrowser() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($userAgent, 'Opera') || strpos($userAgent, 'OPR/')) return 'Opera';
        elseif (strpos($userAgent, 'Edge')) return 'Edge';
        elseif (strpos($userAgent, 'Chrome')) return 'Chrome';
        elseif (strpos($userAgent, 'Safari')) return 'Safari';
        elseif (strpos($userAgent, 'Firefox')) return 'Firefox';
        elseif (strpos($userAgent, 'MSIE') || strpos($userAgent, 'Trident/7')) return 'Internet Explorer';

        return 'Other';
    }

    function getBrowserVersion() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $version = '';

        if (strpos($userAgent, 'Opera') || strpos($userAgent, 'OPR/')) $version = 'Opera';
        elseif (strpos($userAgent, 'Edge')) $version = 'Edge';
        elseif (strpos($userAgent, 'Chrome')) $version = 'Chrome';
        elseif (strpos($userAgent, 'Safari')) $version = 'Safari';
        elseif (strpos($userAgent, 'Firefox')) $version = 'Firefox';
        elseif (strpos($userAgent, 'MSIE') || strpos($userAgent, 'Trident/7')) $version = 'Internet Explorer';

        $start = strpos($userAgent, $version);
        $version = substr($userAgent, $start + strlen($version) + 1);
        $end = strpos($version, ' ');
        $version = substr($version, 0, $end);

        return $version;
    }

    $browser = getBrowser();
    $browserVersion = getBrowserVersion();
@endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 mb-4 text-gray-800 bold-text">Selamat Datang di Kang Bakery</h1>
                <div class="card mb-4 py-3 border-bottom-warning">
                    <div class="card-body">
                        {{-- @foreach ($data as $val)
                    <p>
                        {{$val}}
                    </p>
                    @endforeach --}}
                    <p>
                        ANANDITOSA
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
