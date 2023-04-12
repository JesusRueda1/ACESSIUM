@extends('layouts.auth_app')

@section('title')
    Welcome
@endsection
@section('styles')
    <style>
        #home1 {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #home2 {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #imhome1 {
            width: 400px;
            height: 400px;
        }

        #imhome2 {
            width: 150px;
            height: 120px;
        }





        @media screen and (max-width: 900px) {
            #imhome1 {
                width: 190px;
                height: 190px;
                ;
            }
        }

        @media screen and (max-width: 900px) {
            #imhome2 {
                width: 90px;
                height: 70px;
                text-align: center;
                margin: 0 auto;

            }

        }

    </style>
@endsection
<!--Home-->
@section('content')
    <section class="container-fluid ">
        <br><br>
        <h1 style="text-align: center; text-shadow: 2px 2px black;">ACCESUM</h1>
        <div class="container" id="home1">
            <img src="img/home/datos-personales.png" id="imhome1"><br>
        </div><br><br><br>


        <div class="row" id="home2">
            <img src="img/home/control-de-accesso.png" alt="" hspace="59" id="imhome2">
            <img src="img/home/calendario.png" hspace="59" id="imhome2">
            <img src="img/home/reloj-circular.png" hspace="59" id="imhome2">
            <img src="img/home/bombilla.png" hspace="59" id="imhome2">
            <img src="img/home/estadistica-inferencial.png" hspace="59" id="imhome2">
        </div><br><br><br>
        <h1 style="text-align: center" id>Sistema de control de acceso a las instalaciones del SENA</h1><br>

    </section>
@endsection
