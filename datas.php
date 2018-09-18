<html>
    <head>
        <title>1º Encontro de Professores</title>
        <meta charset="utf-8">
        <script src="../js/jquery-min.js"></script>
        <script src="../js/script.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <style>
        
        .topo {
            z-index: 3;
            position: fixed;
            background-color: white;
            width: 100%;
            height: 10vh;
            top: 0;
            left: 0;
        }

        #logo {
            margin-top: 0;
            margin-left: 2%;
            width: 30%;
            height: 96%;
        }




        .topo img{
            width: 50%;
            height: 100%;
        }

        nav ul li{
            padding: 15px;
            margin-left: 2%;
            white-space: nowrap;
        }
        nav{
            background-color: white !important;

        }
        nav ul{
            margin-right: 16%;
            margin-top: 1%;

        }
        .la{
            background: white;

        }
        nav li a{
            color: black !important;
            font-family: Georgia, sans-serif !important;
            font-size: 15.6px;
            text-align: center;
            text-shadow: 0.3px 0px black;
        }
        nav li a:hover{
            color: background !important;
            font-size: 15.9px;
        }
        
        .frase{
            position: fixed;
            width: 100%;
            top: 10%;
            background-color: #8F9ECC;
            height: 8%;
            z-index: 4;
        }
        .frase h3{
            font-family: Helvetica;
            text-transform: uppercase;
            text-align: center;       
            font-size: 19px;
            margin-top: 0.8%;
            color: white;
            text-shadow: 1px 1px black;
        }
        .imgtema img{
            position: absolute;
            width: 11%;
            height: 80%;
            left: 1.5%;
        }
        #rodape{
            position: fixed;
            height: 12%;
            width: 100%;
            top: 88%;
            background-color: white;
            border-top: 2px solid background;
        }
        #text{
            font-family: 'Cinzel';
            margin-top: 1%;
            text-shadow: 1px 0px black;
        }
        .cardnot{
            margin-top: 3%;
            max-width: 80%;
            margin-left: 10%;
            
        }
        .patro{
            width: 100%;
            height: 100%;
        }
        .pat{
            position: absolute;
            top: 5%;
        }
        #ap1{
            
            left: -1%;
            width: 11%;
            height: 95%;
            top: 25%;
        }
        #ap2{
            left: 9%;
            width: 8%;
            height: 90%;
            top: 24%;
        }
        #pat1{
            left: 92%;
            width: 5%;
            height: 65%;
            top: 30%;
        }
        #pat2{
            left: 81%;
            width: 8%;
            height: 100%;
            top: 15%;
        }
        #pat3{        
            left: 20%;
            width: 14%;
            height: 75%;
            top: 30%;
        }
        #pat4{
            left: 37%;
            width: 7%;
            height: 60%;
            top: 35%;
        }
        #pat5{
            left: 47%;
            width: 10%;
            height: 85%;
            top: 25%;
        }
        #pat6{
            left: 60%;
            width: 8%;
            height: 90%;
            top: 20%;
        }
        #pat7{
            left: 72%;
            width: 8%;
            height: 65%;
            top: 35%;
        }
        #tl{
            position: absolute;
            left: 20%;
            font-size: 16px;
        }
        #t2{
            position: absolute;
            left: 1%;
            font-size: 16px;
        }
    </style>

    <body>



        
        <nav class="navbar navbar-expand-lg navbar-light topo">
            <a class="navbar-brand" href="inicio.php">
                <img src="img/logo-sigev.svg" width="30" height="30" class="d-inline-block align-top" alt="">

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="datas.php">Datas Importantes<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="apresentacao-v.php">Formas de Apresentação</a>
                    </li>
                    <li class="nav-item b">
                        <a class="nav-link" href="back/login.php">Inscrição</a>
                    </li>

                    <li class="nav-item b">
                        <a class="nav-link disabled" href="programacao.php">Programação</a>
                    </li>
                    <li class="nav-item b">
                        <a class="nav-link disabled" href="organizacao.php">Organização</a>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="frase">
            <a class="navbar-brand imgtema" href="inicio.php">
                <img src="img/cefet-estagio.svg" width="30" height="30" class="d-inline-block align-top" alt="">

            </a>
            <div>
                <h3>Valorizando Práticas Pedagógicas Positivas de Promoção do Letramento Literário</h3>

            </div>
        </div>


        <div ></div>
    </div>

    <div class="card mb-3 cardnot" style="border: 0px solid black; margin-top: 12%;">
        <div class="card-header" style="background-color: white; border-bottom: 1px solid black;"><h4 id="text">Datas Importantes</h4></div>
        <div class="card-body">         
            <p class="card-text"><ul>
                <li>Inscrições e envio de resumos: <span style="font-weight: bold">18/09/2018 a 24/09/2018</span></li>
                <li>Divulgação dos trabalhos aceitos: <span style="font-weight: bold">25/09/2018 a 27/09/2018</span></li>
                <li>Divulgação da programação: <span style="font-weight: bold">18/09/2018</span></li>
                <li>Evento: <span style="font-weight: bold">28/09/2018 e 29/09/2018</span></li>
            </ul></p>
        </div>
    </div>


    <div id="rodape">
            <h6 id="t2">Apoio:</h6>
            <div id="ap1" class="pat"><img class="patro" src="img/logo Verona Jeans.jpg"/></div>
            <div id="ap2" class="pat"><img class="patro" src="img/logo stratégia.jpg"/></div>
            <h6 id="tl">Realização:</h6>
            <div id="pat1" class="pat"><img class="patro" src="img/logocefet.jpg"/></div>
            <div id="pat2" class="pat"><img class="patro" src="img/dedc.png"/></div>
            <div id="pat3" class="pat"><img class="patro" src="img/LOGO SRE.png"/></div>
            <div id="pat4" class="pat"><img class="patro" src="img/sinpro logo.png"/></div>
            <div id="pat5" class="pat"><img class="patro" src="img/logo prefeitura de divinópolis.jpg"/></div>
            <div id="pat6" class="pat"><img class="patro" src="img/logomarca-original-crpe.jpg"/></div>
            <div id="pat7" class="pat"><img class="patro" src="img/LOGO Biblioteca nova.gif"/></div>
        </div>

</body>
</html>