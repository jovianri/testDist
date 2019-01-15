let repo = new Repository();

let myVue = new Vue({
    el:'main',
    data:{
        ciudad: null
        
    },
    methods:{
        login(){

        },

        registrar(){

            repo.peticionAjax('postRegistrar', registrar);

        },

        buscar(){
            this.reorganizarPagina();
            this.mostrarFiltros();
            this.mostrarResultados();
            this.mostrarMapa();
        }, 

        reorganizarPagina(){

            $("#content-container").removeClass('grid--1col').addClass('grid--complex'); // cambia grid
            $(".card").empty(); // borra slider y ultimos vistos

        },

        mostrarFiltros(){

            repo.peticionAjax('getCategorias', pintarCategorias);

        },

        mostrarResultados(){

            repo.peticionAjax('getLocales', pintarLocales);

        },

        mostrarMapa(){
            
            let contenedorMapa = $('<div class="grid--area3"></div>');
            let mapa = giveMeMap(); // gives JQuery Map Object

            contenedorMapa.append(mapa);
            $('#content-container').append(contenedorMapa);

        }

    },
    computed:{

    }
});


// Vue calls
function pintarCategorias(conexion){ // Prints categories in DOM

    let filter = $("<div class='filter collapsible-menu'></div>");

    let check = $('<input type="checkbox" id="menu">');
    let titulo = $('<label for="menu">Categorias</label>');

    let contenido = $("<div class='menu-content'></div>");
    let categorias = $("<ul></ul>");
    contenido.append(categorias);
            
    conexion.map((categoria)=>{
        categoria = $("<li>" + categoria.nombre + "</li>");
        categorias.append(categoria);
    })

    filter.append(check);
    filter.append(titulo);
    filter.append(contenido);

    $("#cardOne").html(filter);
}

function registrar(){
    if (registrado) {
        alert("Registro  correcto");
        location.reload();
    } else {
        alert("El registro ha fallado");
    }
}

function pintarLocales(conexion){ // Prints locals in DOM

    let content = $("<div class='card__content'></div>"); 

    conexion.map((local)=>{


    let item = $('<div class="articulo articulo--style"></div>').attr('id',local.id);
    let imagen = $('<div class="articulo__image"></div>');
    let contentItem = $('<div class="articulo__content"></div>');

    imagen.append($('<img src="www/images/'+local.nombreImg +'"></img>')); // como hacer referencia a la foto?

    // mirar un buen nombre, !!!!!!!!!lorenzo
    $('<p class="u-info">' + local.nombre + '</p>').append().appendTo(contentItem);
    // $('<p class="u-info">'+ local.ciudad +'</p>').appendTo(contentItem);
    $('<p class="u-info">'+ local.direccion +'</p>').appendTo(contentItem);
    $('<p class="u-info">' + local.precio + '</p>').appendTo(contentItem);

    item.append(imagen);
    item.append(contentItem);

    content.append(item);

    $("#cardTwo").html(content);

    });
}




// Slider & SearchBar Effect
$(document).ready(()=>{

    $('#ciudadBuscar').focus(function(){
        $(this).animate({width: '50%'}, 300)
    }).blur(function(){
        $(this).animate({width: '30%'}, 300)
    });

    mostrarImagenes();

});

function mostrarImagenes(){
    
    repo.peticionAjax('getImagenes', rellenaSlider);

}

function rellenaSlider(datos){

    datos.map((foto)=>{

        
        let index = foto.nombre.charAt((foto.nombre.indexOf(".")-1));

        $(".fade-carousel").css("background-image","url('./www/images/"+ foto.nombre +"')");
        $(".slides").css("background-image","url('./www/images/"+ foto.nombre +"')");
        $(".slide-"+index).css("background-image","url('./www/images/"+ foto.nombre +"')");

    });

}



// Iframe Google Maps
function giveMeMap(){
    let mapa = $('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d197294.47341345454!2d-0.5015975323079606!3d39.40770124964933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2sValencia!5e0!3m2!1ses!2ses!4v1545241021804" width="500" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>');
    return mapa;
}

