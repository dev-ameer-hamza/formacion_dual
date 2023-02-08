<template>
     <nav class="navbar navbar-dark bg-dark">
                              <div class="text-center  col-4">
            @if(Auth::user()->rol=="Tecnico")
                                  <a class="nav-link text-white" href="#">Contacte al Operario</a>
                              </div>
                              <div  class="text-center  col-4">
                                  <a class="nav-link text-white" href=""><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
                              </div>
                              <div class="text-center  col-4">
                                <a class="nav-link text-white" href="{{ asset('manual/tecnico.pdf') }}">Manual de la aplicacion</a>
                                  @elseif(Auth::user()->rol=="Operador")
                                    <a class="nav-link text-white" href="#">Contacte al Jefe</a>
                              </div>
                              <div  class="text-center col-4">
                                  <a class="nav-link text-white" href=""><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
                              </div>
                              <div class="text-center col-4">
                                <a class="nav-link text-white" href="{{ asset('manual/operador.pdf') }}">Manual de la aplicacion</a>
                                  @elseif(Auth::user()->rol=="Jefe")
                                  <a class="nav-link text-white" href="#">Contacte a Julen</a>
                              </div>
                              <div  class="text-center  col-4">
                                  <a class="nav-link text-white" href=""><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
                              </div>
                              <div class="text-center  col-4">
                                @else
                                  <a class="nav-link text-white" href="#">Eres Julen</a>
                              </div>
                              <div  class="text-center   col-4">
                                  <a class="nav-link text-white" href=""><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
                              </div>
                              <div class="text-center  col-4">
                                <a class="nav-link text-white" href="{{ imagen }}">Manual de la aplicacion</a>
                                  @endif
                              </div>
                            </nav>
</template>