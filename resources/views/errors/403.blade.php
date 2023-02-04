@extends('adminlte::page')

@section('title', 'MAKRO | ERROR 403')

@section('content')
    <div class="container">
        <div class="ghost">
            <div class="ghost--navbar"></div>
              <div class="ghost--columns">
                <div class="ghost--column">
                  <div class="code"></div>
                  <div class="code"></div>
                  <div class="code"></div>
                  <div class="code"></div>
                </div>
                <div class="ghost--column">
                  <div class="code"></div>
                  <div class="code"></div>
                  <div class="code"></div>
                  <div class="code"></div>
                </div>
                <div class="ghost--column">
                  <div class="code"></div>
                  <div class="code"></div>
                  <div class="code"></div>
                  <div class="code"></div>
                </div>
                
              </div>
              <div class="ghost--columns">
                <div class="ghost--column text-white pl-5">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h3>Estas intentando acceder a una ruta a la que no estas autorizado...</h3>
                <h5>Ponte en contacto con la oficina de TI</h5>
                <h2><a href="{{route('dashboard')}}">Ir al Inicio!</a></h2>
                </div>
              </div>
            
            </div>
            
            <h1 class="police-tape police-tape--1">
              &nbsp;&nbsp;&nbsp;&nbsp;Error: 403&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error: 403&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error: 403&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error: 403&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error: 403&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error: 403&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error: 403
            </h1>
            <h1 class="police-tape police-tape--2">Prohibido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prohibido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            
            
    </div>
    @stop
    @section('css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:700');

        
        .text-white{
            color: white;
        }

        .police-tape {
            background-color: #001f3f;
            background: linear-gradient(180deg, #eed887 0%, #e2bb2d 5%, #e2bb2d 90%, #e5c243 95%, #0e0b02 100%);
            padding: 0.125em;
            font-size: 3em;
            text-align: center;
            white-space: nowrap;
        }

        .police-tape--1 {
            transform: rotate(10deg);
            position: absolute;
            top: 40%;
            left: -5%;
            right: -5%;
            z-index: 2;
            margin-top: 0;
        }

        .police-tape--2 {
            transform: rotate(-8deg);
            position: absolute;
            top: 50%;
            left: -5%;
            right: -5%;
        }

        .ghost {
            display: flex;
            justify-content: stretch;
            flex-direction: column;
            height: 80vh;
        }

        .ghost--columns {
            display: flex;
            flex-grow: 1;
            flex-basis: 200px;
            align-content: stretch;
        }

        .ghost--navbar {
            flex: 0 0 60px;
            background: linear-gradient(0deg, #27292d 0px, #27292d 10px, transparent 10px);
            border-bottom: 2px solid #111;
        }

        .ghost--column {
            flex: 1 0 30%;
            border-width: 0px;
            border-style: solid;
            border-color: #27292d;
            border-left-width: 10px;
            background-color: #191a1d;
        }

        .ghost--column:nth-child(1) .code:nth-child(1) {
            margin-left: 4em;
        }

        .ghost--column:nth-child(1) .code:nth-child(2) {
            margin-left: 1.5em;
        }

        .ghost--column:nth-child(1) .code:nth-child(3) {
            margin-left: 5em;
        }

        .ghost--column:nth-child(1) .code:nth-child(4) {
            margin-left: 3.5em;
        }

        .ghost--column:nth-child(2) .code:nth-child(1) {
            margin-left: 5em;
        }

        .ghost--column:nth-child(2) .code:nth-child(2) {
            margin-left: 2em;
        }

        .ghost--column:nth-child(2) .code:nth-child(3) {
            margin-left: 3em;
        }

        .ghost--column:nth-child(2) .code:nth-child(4) {
            margin-left: 3.5em;
        }

        .ghost--column:nth-child(3) .code:nth-child(1) {
            margin-left: 5.5em;
        }

        .ghost--column:nth-child(3) .code:nth-child(2) {
            margin-left: 1.5em;
        }

        .ghost--column:nth-child(3) .code:nth-child(3) {
            margin-left: 3em;
        }

        .ghost--column:nth-child(3) .code:nth-child(4) {
            margin-left: 3em;
        }

        .ghost--main {
            background-color: #111;
            border-top: 15px solid #303338;
            flex: 1 0 100px;
        }

        .code {
            display: block;
            width: 100px;
            background-color: #27292d;
            height: 1em;
            margin: 1em;
        }

        .ghost--main .code {
            height: 2em;
            width: 200px;
        }

    </style>
    @stop

    @section('js')
        <script>
            var root = document.documentElement;
            var eyef = document.getElementById('eyef');
            var cx = document.getElementById("eyef").getAttribute("cx");
            var cy = document.getElementById("eyef").getAttribute("cy");

            document.addEventListener("mousemove", evt => {
                let x = evt.clientX / innerWidth;
                let y = evt.clientY / innerHeight;

                root.style.setProperty("--mouse-x", x);
                root.style.setProperty("--mouse-y", y);

                cx = 115 + 30 * x;
                cy = 50 + 30 * y;
                eyef.setAttribute("cx", cx);
                eyef.setAttribute("cy", cy);

            });

            document.addEventListener("touchmove", touchHandler => {
                let x = touchHandler.touches[0].clientX / innerWidth;
                let y = touchHandler.touches[0].clientY / innerHeight;

                root.style.setProperty("--mouse-x", x);
                root.style.setProperty("--mouse-y", y);
            });
        </script>
    @stop
