const apiproduct = new Vue({
    el: '#apiproduct',
    data: {
        nombre: '',
        slug: '',
        div_mensajeslug:'Slug Existe',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton:1,

        //variables de precios
        precioanterior:0,
        precioactual:0,
        descuento:0,
        porcentajededescuento:0,
        descuento_mensaje:'0'
    }, 
    computed: {
        generarSLug : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;

            this.slug =  this.nombre.trim().replace(expr, function(e){
                return char[e]
            }).toLowerCase()

           return this.slug;
           //return this.nombre.trim().replace(/ /g,'-').toLowerCase()
        }
    }

});
