window.onload = function() {    
  // Configurcion inicial
  var tableroJuego = [ 
    [  0,  1,  0,  1,  0,  1,  0,  1 ],
    [  1,  0,  1,  0,  1,  0,  1,  0 ],
    [  0,  1,  0,  1,  0,  1,  0,  1 ],
    [  0,  0,  0,  0,  0,  0,  0,  0 ],
    [  0,  0,  0,  0,  0,  0,  0,  0 ],
    [  2,  0,  2,  0,  2,  0,  2,  0 ],
    [  0,  2,  0,  2,  0,  2,  0,  2 ],
    [  2,  0,  2,  0,  2,  0,  2,  0 ]
  ];
  // arreglos de piezas y casillas
  var piezas = [];
  var casillas = []; 

  // variables para controlar la puntuacion
  var pcap1 = 0;
  var pcap2 = 0;
  var ganador = '';
  
  // formula de la distancia entre dos puntos
  var dist = function (x1, y1, x2, y2) {
    return Math.sqrt(Math.pow((x1-x2),2)+Math.pow((y1-y2),2));
  }
  // Objeto Pieza: se crean 24 para el juego
  function Pieza (elemento, posicion) {
    // enlace al DOM
    this.elemento = elemento;
    // posicion de la pieza en formato [fila,columna]
    this.posicion = posicion; 
    // Asignacion de piezas a cada jugador
    if(this.elemento.attr("id") < 12)
      this.jugador = 1;
    else
      this.jugador = 2;
    // Convertir una pieza en dama
    this.dama = false;
    this.coronar = function () {
      this.elemento.css("backgroundImage", "url('img/dama"+this.jugador+".png')");
      this.dama = true;
    }
    // Mover la pieza
    this.mover = function (casilla) { 
      this.elemento.removeClass('selected'); 
      if(!Tablero.esPosicionValida(casilla.posicion[0], casilla.posicion[1])) return false;
      // Si la pieza no es dama, solo puede avanzar hacia adelante
      if(this.jugador == 1 && this.dama == false) {
        if(casilla.posicion[0] < this.posicion[0]) return false;
      } else if (this.jugador == 2 && this.dama == false) {
        if(casilla.posicion[0] > this.posicion[0]) return false;
      }
      // Quitar la marca en el tablero de la antigua posicion y poner la nueva
      Tablero.tablero[this.posicion[0]][this.posicion[1]] = 0;
      Tablero.tablero[casilla.posicion[0]][casilla.posicion[1]] = this.jugador;
      this.posicion = [casilla.posicion[0], casilla.posicion[1]];
      // Cambiar la posicion mediante css, utilizando el arreglo de medidas
      this.elemento.css('top', Tablero.medidas[this.posicion[0]]);
      this.elemento.css('left', Tablero.medidas[this.posicion[1]]);
      // si la pieza alcanza los limites del arreglo de filas se puede coronar
      if(!this.dama && (this.posicion[0] == 0 || this.posicion[0] == 7 )) 
        this.coronar();
      Tablero.cambiarTurno();
      return true;
    };
    
    // Valida si la pieza puede saltar a cualquier posicion valida
    this.puedeSaltar = function () {
      if(this.puedeSaltarRival([this.posicion[0]+2, this.posicion[1]+2]) ||
         this.puedeSaltarRival([this.posicion[0]+2, this.posicion[1]-2]) ||
         this.puedeSaltarRival([this.posicion[0]-2, this.posicion[1]+2]) ||
         this.puedeSaltarRival([this.posicion[0]-2, this.posicion[1]-2])) {
        return true;
      } 
      return false;
    };
    
    // Valida si un salto puede hacerse a una casilla especifica
    this.puedeSaltarRival = function(posicionNueva) {
      // calcula el cambio de las posiciones
      var dx = posicionNueva[1] - this.posicion[1];
      var dy = posicionNueva[0] - this.posicion[0];
      // si no es dama no puede saltar hacia atras
      if(this.jugador == 1 && this.dama == false) {
        if(posicionNueva[0] < this.posicion[0]) return false;
      } else if (this.jugador == 2 && this.dama == false) {
        if(posicionNueva[0] > this.posicion[0]) return false;
      }
      // debe estar dentro del tablero
      if(posicionNueva[0] > 7 || posicionNueva[1] > 7 || posicionNueva[0] < 0 || posicionNueva[1] < 0) return false;
      // se calcula la posicion de la nueva casilla
      var posCasX = this.posicion[1] + dx/2;
      var posCasY = this.posicion[0] + dy/2;
      // valida que haya una pieza en esa posicion y que adelante este vacio
      if(!Tablero.esPosicionValida(posCasY, posCasX) && Tablero.esPosicionValida(posicionNueva[0], posicionNueva[1])) {
        // busca la pieza que se encuentra ahi
        for(piezaIt in piezas) {
          if(piezas[piezaIt].posicion[0] == posCasY && piezas[piezaIt].posicion[1] == posCasX) {
            if(this.jugador != piezas[piezaIt].jugador) {
              return piezas[piezaIt];
            }
          }
        }
      }
      return false;
    };
    
    this.saltarRival = function (casilla) {
      var piezaAQuitar = this.puedeSaltarRival(casilla.posicion);
      if(piezaAQuitar) {
        piezas[piezaIt].quitar();
        return true;
      }
      return false;
    };
    
    this.quitar = function () {
      // quita la ficha utilizando css
      this.elemento.css("display", "none");

      Tablero.tablero[this.posicion[0]][this.posicion[1]] = 0;
      this.posicion = [];
    }

    this.getCasilla = function () {
      return this.posicion;
    }

  }
  
  function Casilla (elemento, posicion) {
    // enlace al elemento del DOM
    this.elemento = elemento;
    // posicion en el tablero
    this.posicion = posicion;
    // si la casilla esta en rango de la pieza
    this.enRango = function(pieza) {
      if(dist(this.posicion[0], this.posicion[1], pieza.posicion[0], pieza.posicion[1]) == Math.sqrt(2)) {
        // movimiento normal
        return 'normal';
      } else if(dist(this.posicion[0], this.posicion[1], pieza.posicion[0], pieza.posicion[1]) == 2*Math.sqrt(2)) {
        // capturar ficha
        return 'saltar';
      }
    };
  }
  
  // Objeto Tablero: controla las acciones en el juego
  var Tablero = {
    tablero: tableroJuego,
    turnoJugador: 2,
    divCasillas: $('div.casillas'),
    // medidas para dibujar el tablero
    medidas: ["0vmin", "10vmin", "20vmin", "30vmin", "40vmin", "50vmin", "60vmin", "70vmin", "80vmin", "90vmin"],
    // inicializar el tablero
    inicializar: function () {
      var contaPiezas = 0;
      var contaCasilla = 0;
      for (i in this.tablero) { // i recorre las filas
        for (j in this.tablero[i]) { //j recorre las columnas
          // distribucion de casillas y piezas en el tablero
          if(i%2 == 1) {
            if(j%2 == 0) {
              this.divCasillas.append("<div class='casilla' id='casilla"+contaCasilla+"' style='top:"+this.medidas[i]+";left:"+this.medidas[j]+";'></div>");
              casillas[contaCasilla] = new Casilla($("#casilla"+contaCasilla), [parseInt(i), parseInt(j)]);
              contaCasilla += 1;
            }
          } else {
            if(j%2 == 1) {
              this.divCasillas.append("<div class='casilla' id='casilla"+contaCasilla+"' style='top:"+this.medidas[i]+";left:"+this.medidas[j]+";'></div>");
              casillas[contaCasilla] = new Casilla($("#casilla"+contaCasilla), [parseInt(i), parseInt(j)]);
              contaCasilla += 1;
            }
          }
          if(this.tablero[i][j] == 1) {
            $('.piezasJug1').append("<div class='pieza' id='"+contaPiezas+"' style='top:"+this.medidas[i]+";left:"+this.medidas[j]+";'></div>");
            piezas[contaPiezas] = new Pieza($("#"+contaPiezas), [parseInt(i), parseInt(j)]);
            contaPiezas += 1;
          } else if(this.tablero[i][j] == 2) {
            $('.piezasJug2').append("<div class='pieza' id='"+contaPiezas+"' style='top:"+this.medidas[i]+";left:"+this.medidas[j]+";'></div>");
            piezas[contaPiezas] = new Pieza($("#"+contaPiezas), [parseInt(i), parseInt(j)]);
            contaPiezas += 1;
          }
        }
      }
    },

    esPosicionValida: function (i, j) {
      if(this.tablero[i][j] == 0) {
        return true;
      } return false;
    },

    esFindelJuego: function() {
      if( pcap1 == 12 ) {
        ganador = 1;
        return true;
      }
      if( pcap2 == 12 ) {
        ganador = 2;
        return true;
      }
      if( pcap1 == 11 && pcap2 == 11 ) {
        ganador = 0;
        return true;
      }

      return false;
    },

    cambiarTurno: function () {
      if(this.turnoJugador == 1) {
        this.turnoJugador = 2;
        $('.turno1').hide();
        $('.turno2').show();
        return;
      }
      if(this.turnoJugador == 2) {
        this.turnoJugador = 1;
        $('.turno2').hide();
        $('.turno1').show();
      }
    },
    // reinicia el juego
    reiniciar: function () {
      location.reload(); 
    }
  }
  
  // crea el tablero
  Tablero.inicializar();
  
  /*** Eventos ***/
  // selecciona la pieza del jugador en turno
  function piezaClick () {
    var posCasilla, p, idCasilla;
    var selected;
    var pieza;
    var esTurnoJugador = ($(this).parent().attr("class").split(' ')[0] == "piezasJug"+Tablero.turnoJugador);
    if(esTurnoJugador) {
      if($(this).hasClass('selected')) selected = true;
      $('.pieza').each(function(index) {$('.pieza').eq(index).removeClass('selected');});
      $('.casilla').each(function(index) {$('.casilla').eq(index).removeClass('verde');});
      if(!selected) {
        $(this).addClass('selected');
        pieza = piezas[$('.selected').attr("id")];
        posCasilla = pieza.getCasilla();
        p = parseInt(posCasilla[0])*8+parseInt(posCasilla[1]);
        p = parseInt(p/2);
        idCasilla = "#casilla"+p;
        $(idCasilla).addClass('verde');
      }
    }
    else {
      alert("No es tu turno >:c");
    }
  };

  $('.turno2').show();

  $('.pieza').on("click", piezaClick );
  
  // reiniciar el juego al presionar el boton de reiniciar
  $('#reinicio').on("click", function () {
    Tablero.reiniciar();
  });
  
  // mueve la casilla al darle click a una casilla
  $('.casilla').on("click", function () {
    // verifica que haya una pieza seleccionada
    if($('.selected').length != 0) {
      // ubica el objeto casilla que fue seloeccionado
      var casillaID = $(this).attr("id").replace(/casilla/, '');
      var casilla = casillas[casillaID];
      // ubica la pieza que fue seleccionada
      var pieza = piezas[$('.selected').attr("id")];
      // valida que la casilla este en rango de la pieza
      var enRango = casilla.enRango(pieza);
      var mensaje;
      if(enRango) {

        if(enRango == 'saltar') {
          if(pieza.saltarRival(casilla)) {
            pieza.mover(casilla);
            $('.casilla').each(function(index) {$('.casilla').eq(index).removeClass('verde');});
            if( Tablero.turnoJugador == 1 ) {
              pcap2++;
            }
            if( Tablero.turnoJugador == 2 ) {
              pcap1++;
            }   
            console.log(pcap1+", "+pcap2);
            $('.marca1').html(pcap1);
            $('.marca2').html(pcap2);     
            if( Tablero.esFindelJuego() ) {
              $('.pieza').off("click", piezaClick );
              if( ganador == 1 ) {
                mensaje = "Gana el jugador 1";
              }
              if( ganador == 2 ) {
                mensaje = "Gana el jugador 2";
              }
              if( ganador == 0 ) {
                mensaje = "Empate";
              }
              alert("Fin del juego - "+mensaje); 
            }    
            if(pieza.puedeSaltar()) {
               Tablero.cambiarTurno(); 
               pieza.elemento.addClass('selected');
            }
          } 
        } else if(enRango == 'normal') {
          pieza.mover(casilla);
          $('.casilla').each(function(index) {$('.casilla').eq(index).removeClass('verde');});
        }

      }
    }
  });
}