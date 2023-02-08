<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <!-- End Bootstrap CSS -->

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body  class="m-0 vh-100 row justify-content-center align-items-center" style="background-color: #0156ce">
    <div class="container login-form">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="offest-md-4">
                            <div class="text-center"><img src="{{ Vite::asset('resources/images/deusto.jpeg') }}" alt="error" height="90" style="max-width:100%;"></div>
                            
                            <!--FORMULARIO CAMBIAR CONTRASEÑA-->
                            <form class="form-login" method="get" action="{{ route('send-email') }}">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label " for="email">@lang("common.email")</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><span class='bi bi-at'></span></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="@lang('common.email')" required/>
                                    </div>
                                </div>

                                <!-- Radiobutton del rol -->
                                <div class="d-flex justify-content-center mb-4 flex-wrap">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radioRol" id="radioAlumno" value="alumno" required/>
                                        <label class="form-check-label" for="radioAlumno">@lang('common.alumno')</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radioRol" id="radioTutor" value="tutorCoordinador" />
                                        <label class="form-check-label" for="radioTutor">@lang('common.tutor')</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radioRol" id="radioCoordinador" value="tutorCoordinador" />
                                        <label class="form-check-label" for="radioCoordinador">@lang('common.coordinador')</label>
                                    </div>
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radioRol" id="radioTutorEmpresa" value="tutorEmpresa" />
                                        <label class="form-check-label" for="radioTutorEmpresa">@lang('common.tutorEmpresa')</label>
                                    </div>                                  
                                </div>
                                
                                <!-- Boton cambiar contraseña-->
                                <div class="col-md-12">
                                    <button type="submit" class="col-12 btn btn-primary btn-block mb-4">@lang("common.CambiarContraseña")</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>