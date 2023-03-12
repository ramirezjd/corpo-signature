<!DOCTYPE html>
<html>

<head>
    <title>Generacion de documento firmado CORPOSALUD</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .mt-30 {
        margin-top: 30px;
    }

    .text-center {
        text-align: center !important;
    }

    .text-justify {
        text-align: justify !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-85 {
        width: 85%;
    }

    .w-80 {
        width: 80%;
    }

    .w-50 {
        width: 50%;
    }

    .w-30 {
        width: 30%;
    }

    .w-25 {
        width: 25%;
    }

    .w-20 {
        width: 20%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 120px;
        height: 35px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="membrete add-detail mt-10">
        <div class="w-20 float-left logo mt-10">
            <img src="{{ public_path('assets/img/logo.png') }}" alt="Logo">
        </div>
        <div class="w-80 text-justify float-left">
            <span class="text-bold">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta quos ad
            </span>
            <br>
            <span class="text-bold">
                Aspernatur esse modi, fugiat pariatur sapiente. Tempora cum eaque
            </span>
            <br>
            <span class="text-bold">
                Nihil cupiditate possimus amet sit blanditiis architecto tempore obcaec
            </span>
            <br>
            <span class="text-bold">
                ati officiis, quasi, rem porro nesciunt, alias accusamus? Necessitati
            </span>

        </div>
        
        <div style="clear: both;"></div>
    </div>

    <div class="add-detail mt-10">
        <div class="w-100 float-left mt-10">
            {!! $body !!}
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 text-center mt-10">
        @php $width = 0; @endphp
        @foreach ($users as $user)

            @if ($width==0)
                <div class="add-detail mt-30">
            @endif
                    <div class="w-30 float-left">
                        <label>Firma</label><br>
                        <img src="{{public_path($user->signaturePath)}}" width="200" height="100"  alt=""><br>
                        <span>{{$user->apellidos_usuario}} {{$user->nombres_usuario}}</span><br>
                        <span>{{$user->documento_usuario}}</span><br>
                    </div>
                    @php $width += 30; @endphp
            @if ($width==90)
                    <div style="clear: both;"></div>
                </div>
                @php $width = 0; @endphp
            @endif

        @endforeach
    </div>
</body>

</html>
