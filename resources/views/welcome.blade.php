<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bemol omnichannel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- VUEJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/album/album.css" rel="stylesheet">
</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>Bemol Omnichannel</strong>
                </a>

                <div class="d-flex justify-content-between">
                    <a class="d-flex align-items-center btn btn-sm btn-secondary text-light ml-1" href="{{route('registro')}}">
                        Registro
                    </a>
                </div>

            </div>
        </div>
    </header>

    <main role="main">
        <div id="app">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Bemol Omnichannel</h1>
                    <p class="lead text-muted">A função deste sistema é demonstrar a funcionalidade de um identificador em um sistema omnichannel.</p>
                </div>
            </section>

            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="card mb-6 box-shadow">
                                <div class="card-header">
                                    🌐 Atendimento Online <b v-if="userName"> - @{{userName}}</b>
                                </div>
                                <div class="card-body" style="overflow-y: auto; scroll-behavior: smooth;">
                                    <div style="height: 300px;">
                                        <div id="start1" align="center">
                                            <input class="form-control" v-model="modelUsername" placeholder="nome de usuário"></input>
                                            <p>
                                                <button class="btn btn-sm btn-success mt-1" @click="getApiUsersByUsername(modelUsername)" align="center">Iniciar atendimento</button>
                                            </p>
                                        </div>
                                        <div v-if="userName">
                                            <div v-for="(index,message) in messages" :key="index">
                                                <div class="d-flex flex-row-reverse">
                                                    <text id="scrollBottom">
                                                        @{{message.name}}
                                                    </text>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center container mb-2">
                                    <input id="input1" disabled v-model="message1" class="form-control"></input>
                                    <div class="btn-group">
                                        <button id="button1" disabled @click="sendMessage(message1)" type="button" class="btn btn-sm btn-outline-secondary ml-1">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 mt-2">
                            <div class="card mb-6 box-shadow">
                                <div class="card-header">
                                    📞 Atendimento Telefônico <b v-if="userPhone"> - @{{userPhone}}</b>
                                </div>
                                <div class="card-body" style="overflow-y: auto; scroll-behavior: smooth;">
                                    <div style="height: 300px;">
                                        <div id="start2" align="center">
                                            <input class="form-control" v-model="modelPhone" placeholder="Número de telefone"></input>
                                            <p>
                                                <button class="btn btn-sm btn-success mt-3" align="center" @click="getApiUsersByPhone(modelPhone)">Iniciar atendimento</button>
                                            </p>
                                        </div>
                                        <div v-if="userPhone">
                                            <div v-for="(index,message) in messages" :key="index">
                                                <div class="d-flex flex-row-reverse">
                                                    <text id="scrollBottom">
                                                        @{{message.name}}
                                                    </text>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center container mb-2">
                                    <input id="input2" disabled v-model="message2" class="form-control"></input>
                                    <div class="btn-group">
                                        <button id="button2" disabled @click="sendMessage(message2)" type="button" class="btn btn-sm btn-outline-secondary ml-1">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="card mb-6 box-shadow">
                                <div class="card-header">
                                    🧑 Atendimento Presencial <b v-if="userCpf"> - @{{userCpf}}</b>
                                </div>
                                <div class="card-body" style="overflow-y: auto; scroll-behavior: smooth;">
                                    <div style="height: 300px;">
                                        <div id="start3" align="center">
                                            <input class="form-control" v-model="modelCpf" placeholder="CPF"></input>
                                            <p>
                                                <button class="btn btn-sm btn-success mt-3" @click="getApiUsersByCpf(modelCpf)" align="center">Iniciar atendimento</button>
                                            </p>
                                        </div>
                                        <div v-if="userCpf">
                                            <div v-for="(index,message) in messages" :key="index">
                                                <div class="d-flex flex-row-reverse">
                                                    <text id="scrollBottom">
                                                        @{{message.name}}
                                                    </text>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center container mb-2">
                                    <input id="input3" disabled v-model="message3" class="form-control"></input>
                                    <div class="btn-group">
                                        <button id="button3" disabled type="button" @click="sendMessage(message3)" class="btn btn-sm btn-outline-secondary ml-1">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card mb-6 box-shadow">
                                <div class="card-header">
                                    📧 Atendimento via e-mail <b v-if="userMail"> - @{{userMail}}</b>
                                </div>
                                <div class="card-body" style="overflow-y: auto; scroll-behavior: smooth;">
                                    <div style="height: 300px;">
                                        <div id="start4" align="center">
                                            <input class="form-control" v-model="modelEmail" placeholder="Email"></input>
                                            <p>
                                                <button class="btn btn-sm btn-success mt-3" @click="getApiUsersByEmail(modelEmail)" align="center">Iniciar atendimento</button>
                                            </p>
                                        </div>
                                        <div v-if="userEmail">
                                            <div v-for="(index,message) in messages" :key="index">
                                                <div class="d-flex flex-row-reverse">
                                                    <text id="scrollBottom">
                                                        @{{message.name}}
                                                    </text>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center container mb-2">
                                    <input id="input4" v-model="message4" disabled class="form-control"></input>
                                    <div class="btn-group">
                                        <button id="button4" disabled @click="sendMessage(message4)" type="button" class="btn btn-sm btn-outline-secondary ml-1">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{asset('storage/js/main.js')}}"></script>
</body>

</html>