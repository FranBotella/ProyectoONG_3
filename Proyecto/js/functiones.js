// ocultar contraseña o mostrar en iniciar sesion
var hide = document.getElementById("ojo");
if (hide != null) {
    hide.addEventListener('click', function () {
        var mostrar = document.getElementById("password2");
        if (mostrar.type == "password") {
            mostrar.type = "text";
            hide.src = "./img/ojoAbierto.png";
        }
        else {
            mostrar.type = "password";
            hide.src = "./img/ojoCerrado.png";
        }
    });
}
// ocultar contraseña o mostrar en registrar sesion
var hide2 = document.getElementById("ojo2");
if (hide2 != null) {
    hide2.addEventListener('click', function () {
        mostrar = document.getElementById("password");
        if (mostrar.type == "password") {
            mostrar.type = "text";
        }
        else {
            mostrar.type = "password";
        }
    });
}
// cambiar color al pasar raton sobre los precios en donaciones
var changeColor = document.getElementById("donaciones");

if (changeColor != null) {
    var numero = 500;
    // changeColor.style.backgroundColor = "lightsalmon";
    
changeColor.addEventListener('mouseout', function () {
    changeColor.style.backgroundColor = "white";
 
});
changeColor.addEventListener('click', function () {
    changeColor.style.backgroundColor = "lightsalmon";
    console.log(document.getElementById("donar1"));
    document.getElementById("CDonada").innerHTML = document.getElementById("donar1").innerText.substring(0, 2);
  
});
    // var _loop_1 = function () {
    //     changeColor.addEventListener('mouseout', function () {
    //         changeColor.style.backgroundColor = "white";
    //         console.log(changeColor);
    //     });
    //     changeColor.addEventListener('mouseover', function () {
    //         changeColor.style.backgroundColor = "lightsalmon";
    //         console.log(changeColor);
    //     });
        
    // };
    // for (var i = 0; i < changeColor.childNodes.length; i++) {
    //     _loop_1(i);
    // }
}
var changeColor2 = document.getElementById("donaciones2");
if (changeColor2 != null) {
    var numero = 500;
    // changeColor.style.backgroundColor = "lightsalmon";
    
changeColor2.addEventListener('mouseout', function () {
    changeColor2.style.backgroundColor = "white";
    
});
changeColor2.addEventListener('click', function () {
    changeColor2.style.backgroundColor = "lightsalmon";
    document.getElementById("CDonada").innerHTML = document.getElementById("donar2").innerText.substring(0, 2);
});
    // var _loop_1 = function () {
    //     changeColor.addEventListener('mouseout', function () {
    //         changeColor.style.backgroundColor = "white";
    //         console.log(changeColor);
    //     });
    //     changeColor.addEventListener('mouseover', function () {
    //         changeColor.style.backgroundColor = "lightsalmon";
    //         console.log(changeColor);
    //     });
        
    // };
    // for (var i = 0; i < changeColor.childNodes.length; i++) {
    //     _loop_1(i);
    // }
}

var changeColor3 = document.getElementById("donaciones3");
if (changeColor3 != null) {
    var numero = 500;
    // changeColor.style.backgroundColor = "lightsalmon";
    
changeColor3.addEventListener('mouseout', function () {
    changeColor3.style.backgroundColor = "white";

});
changeColor3.addEventListener('click', function () {
    changeColor3.style.backgroundColor = "lightsalmon";
    document.getElementById("CDonada").innerHTML = document.getElementById("donar3").innerText.substring(0, 2);
});
    // var _loop_1 = function () {
    //     changeColor.addEventListener('mouseout', function () {
    //         changeColor.style.backgroundColor = "white";
    //         console.log(changeColor);
    //     });
    //     changeColor.addEventListener('mouseover', function () {
    //         changeColor.style.backgroundColor = "lightsalmon";
    //         console.log(changeColor);
    //     });
        
    // };
    // for (var i = 0; i < changeColor.childNodes.length; i++) {
    //     _loop_1(i);
    // }
}
var changeColor4 = document.getElementById("donaciones4");
if (changeColor4 != null) {
    var numero = 500;
    // changeColor.style.backgroundColor = "lightsalmon";
    
changeColor4.addEventListener('mouseout', function () {
    changeColor4.style.backgroundColor = "white";
    console.log(changeColor);
});
changeColor4.addEventListener('click', function () {
    changeColor4.style.backgroundColor = "lightsalmon";
    
});
    // var _loop_1 = function () {
    //     changeColor.addEventListener('mouseout', function () {
    //         changeColor.style.backgroundColor = "white";
    //         console.log(changeColor);
    //     });
    //     changeColor.addEventListener('mouseover', function () {
    //         changeColor.style.backgroundColor = "lightsalmon";
    //         console.log(changeColor);
    //     });
        
    // };
    // for (var i = 0; i < changeColor.childNodes.length; i++) {
    //     _loop_1(i);
    // }
}
var botonCookies = document.getElementById("botonCookies");
console.log(botonCookies);
if (botonCookies != null) {
    window.onload = document.getElementById("botonCookies").click();
}
// abrir dialogo al aceptar que causa y precio donar
var btnContinuar = document.getElementById("BTN-BTNContinuar");
if (btnContinuar != null) {
    var btnCerrar = document.getElementById("btn-cerrar-modal");
    var modal_1 = document.getElementById("modal");
    btnContinuar.addEventListener("click", function () {
        // console.log(document.getElementById("CCausa").innerHTML);
        if (document.getElementById("CDonada").innerHTML != "" || document.getElementById("precioDI").value != "") {
            if (document.getElementById("CCausa").innerHTML != "") {
                modal_1.showModal();
                document.getElementById("modal").setAttribute("id","modal2");
               
            }
            else {
                document.getElementById("mensajeDonar").innerHTML="Seleccione cuanto quiere donar y la causa";
               console.log(document.getElementById("CCausa"));
               console.log(document.getElementById("CDonada"));
            }
        }
        else {
            alert("Seleccione cuanto quiere donar y la causa");
            console.log(document.getElementById("CCausa"));
            console.log(document.getElementById("CDonada"));
        }
    });
    var precioD = document.querySelectorAll("#donar");
    precioD.forEach(function (e) {
        e.addEventListener('click', function () {
            document.getElementById("CDonada").innerHTML = e.innerText.substring(0, 2);
            console.log(e.innerText);
            console.log(e);
        });
    });
    var precioDIO2 = document.getElementById("precioDI");
    precioDIO2.addEventListener('keyup', function () {
        var precioDIO = document.getElementById("precioDI").value;
        console.log(precioDIO);
        document.getElementById("CDonada").innerHTML = precioDIO;
    });
    var Causa_1 = document.getElementById("titleD");
    Causa_1.addEventListener('click', function () {
        console.log(Causa_1.value);
        console.log(Causa_1);
        document.getElementById("CCausa").innerHTML = Causa_1.value;
    });
    btnCerrar.addEventListener("click", function () {
        modal_1.closest();
    });
    // botones paypal
    paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder: function () {
            return fetch("/my-server/create-paypal-order", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                // use the "body" param to optionally pass additional order information
                // like product skus and quantities
                body: JSON.stringify({
                    cart: [
                        {
                            sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                            quantity: "YOUR_PRODUCT_QUANTITY",
                        },
                    ],
                }),
            })
                .then(function (response) { return response.json(); })
                .then(function (order) { return order.id; });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: function (data) {
            return fetch("/my-server/capture-paypal-order", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    orderID: data.orderID
                })
            })
                .then(function (response) { return response.json(); })
                .then(function (orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert("Transaction ".concat(transaction.status, ": ").concat(transaction.id, "\n\nSee console for all available details"));
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  window.location.href = 'thank_you.html';
            });
        }
    }).render('#paypal-button-container');
}
// al clickar en un blog se expande y ocupa toda la pagina
var elementosBlog = document.querySelectorAll(".tituloblog");
if (elementosBlog != null) {
    console.log(document.getElementsByClassName("blog"));
    console.log(elementosBlog);
    elementosBlog.forEach(function (e) {
        e.addEventListener('click', function () {
            insertar = e.parentNode.parentNode.parentNode.parentNode.outerHTML;
            console.log(e.parentNode.parentNode.parentNode.parentNode);
            document.getElementById("borrar").remove();
            // insertar += "<footer>\n  <div  class=\" pie \">\n      <div  >\n        <div class=\"prueba\">\n        <img id=\"socialMedia\"  src=\"./img/facebook.png\" ></img>\n        <img  id=\"socialMedia\"  src=\"./img/instgram3.png\" ></img>\n        </div>\n      </div>\n    </div>\n    </footer>";
            document.getElementById("contenido").innerHTML = insertar;
            elementoCambiar = document.getElementById("atributo");
            console.log(elementoCambiar);
            console.log(e.parentNode.parentNode.parentNode.parentNode.id);
            elementoCambiar2=document.getElementById(e.parentNode.parentNode.parentNode.parentNode.id);
            elementoCambiar.setAttribute('class', 'blog2');
            // elementoCambiar2.setAttribute('class','col-md-8 d-flex ftco-animate');
            document.getElementById("imagenEvento").setAttribute('id','imagenEvento2'); 
            document.getElementById("borrarD").remove();  
            elementoCambiar3=document.getElementById("atributo3");
            elementoCambiar3.setAttribute('class','');
        });
    });
}




// seleccionas un genero en tienda y se borra lo que hubiera y muestra los que has seleccionado
var generoTienda = document.querySelectorAll(".genres");
if (generoTienda != null) {
    
    console.log(generoTienda);
    generoTienda.forEach(function (nombregeneros) {
        nombregeneros.addEventListener('click', function () {
            var genero2 = nombregeneros.innerHTML;
            var padre = document.getElementById("formularioTienda");
            var elemento = document.createElement("INPUT");
            elemento.setAttribute("type", "text");
            elemento.setAttribute("name", "valorSesion");
          
            elemento.setAttribute("value", genero2);
            padre.appendChild(elemento);
            padre.submit();
            document.getElementById("borrar").remove();
            document.getElementById(genero2).style.color="black";
        });
    });
 
   
}
// calcular precio total del carrito
var CantidadCarrito = document.querySelectorAll(".cantidadCarrito");
console.log(CantidadCarrito);
var cantidad = 0;
var numero =0;
if (CantidadCarrito != null) {
    var PrecioCarrito = document.querySelectorAll(".precioCarrito");
    var padre2 = document.getElementById("carritoFORM");
    CantidadCarrito.forEach(function (cantidades) {
        cantidad = cantidad + (parseInt(cantidades.value) * parseInt(cantidades.previousElementSibling.previousElementSibling.previousElementSibling.innerText));
        numero=numero+parseInt(cantidades.value);
        console.log(cantidad);
        cantidades.addEventListener('click', function () {
            cantidad = 0;
            numero =0;
            CantidadCarrito.forEach(function (cantidades1) {
                console.log(cantidades1);
                numero=numero+parseInt(cantidades1.value);
                cantidad = cantidad + (parseInt(cantidades1.value) * parseInt(cantidades1.previousElementSibling.previousElementSibling.previousElementSibling.innerText));
            });
            document.getElementById("CTOTAL").innerText ="N° de Productos: "+numero+ " Precio Total:" + cantidad + "€";
        });
        document.getElementById("CTOTAL").innerText = "N° de Productos: "+numero+ " Precio Total: " + cantidad + " €";
        // console.log(cantidades.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
    });
}
var QuitarProducto = document.querySelectorAll(".BCarrito");
var insertarProductoAEliminar = document.getElementById("bCarrito2");
var insertarProductoAEliminar2 = document.getElementById("elementoseleccionado");
var padre3 = document.querySelector("#carritoFORM2");
console.log(document.getElementById("bCarrito2"));
// quitar un producto d un carrito
QuitarProducto.forEach(function (quitar) {
    quitar.addEventListener('click', function () {
        quitar.style.backgroundColor = 'red';
        console.log(quitar.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value);
        insertarProductoAEliminar2.value = quitar.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value;
        if (insertarProductoAEliminar.value != "borrar") {
            console.log(padre3);
            console.log(insertarProductoAEliminar.value);
            //  padre3.submit();
            //  var a = setInterval(function(){ padre3.submit(); clearInterval(a);}, 3000);
        }
    });
});
var menu = document.getElementsByClassName("menu navbar").item(0);
console.log(menu);
// var padre = document.body;
// console.log(padre);
// padre.prepend(menu);
// padre.style.backgroundColor = "rgb(125,20,107)";
