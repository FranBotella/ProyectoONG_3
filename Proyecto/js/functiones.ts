

// ocultar contraseña o mostrar en iniciar sesion
const hide = document.getElementById("ojo");
if(hide!=null){

    hide.addEventListener('click', function(){
      const  mostrar=document.getElementById("password2");
               if(mostrar.type == "password"){
                   mostrar.type = "text";
                   hide.src="./img/ojoAbierto.png";
               }else{
                   mostrar.type = "password";
                   hide.src="./img/ojoCerrado.png";
               }
           
       });
}
// ocultar contraseña o mostrar en registrar sesion
const hide2 = document.getElementById("ojo2");
if(hide2!=null){
    hide2.addEventListener('click', function(){
        mostrar=document.getElementById("password");
               if(mostrar.type == "password"){
                   mostrar.type = "text";
               }else{
                   mostrar.type = "password";
               }
           
       });
}
// cambiar color al pasar raton sobre los precios en donaciones
const changeColor=document.getElementById("donaciones");
if(changeColor!=null){
    
    const numero=500;
    for (let i = 0; i < changeColor.childNodes.length; i++) {
        changeColor.childNodes[i].addEventListener('mouseout',function(){
        
            changeColor.childNodes[i].style.backgroundColor="white";
        
         
        });
        changeColor.childNodes[i].addEventListener('mouseover',function(){
            changeColor.childNodes[i].style.backgroundColor="lightsalmon";
        });
     


      }
}
const botonCookies= document.getElementById("botonCookies");
console.log(botonCookies);
if(botonCookies!=null){
window.onload=document.getElementById("botonCookies").click();
  
 

}
// abrir dialogo al aceptar que causa y precio donar

const btnContinuar=document.getElementById("BTN-BTNContinuar");
if(btnContinuar!=null){
const btnCerrar=document.getElementById("btn-cerrar-modal");
const modal=document.getElementById("modal");
btnContinuar.addEventListener("click",()=>{
    // console.log(document.getElementById("CCausa").innerHTML);
    if( document.getElementById("CDonada").innerHTML!="" || document.getElementById("precioDI").value !="" ){
        if(document.getElementById("CCausa").innerHTML!=""){
                modal.showModal();
        }
        else{
            
        }
    }
    else{

    }

})

const precioD=document.querySelectorAll("#donar");

precioD.forEach(e => {
    e.addEventListener('click', () => {
        document.getElementById("CDonada").innerHTML=e.innerText.substring(0,2);
        console.log(e.innerText);
      console.log(document.getElementById("CDonada"));
 
       
    })
})


const precioDIO2=document.getElementById("precioDI");
precioDIO2.addEventListener('keyup',()=>{
    const precioDIO=document.getElementById("precioDI").value;
console.log(precioDIO);
    document.getElementById("CDonada").innerHTML=precioDIO; 
})



const Causa=document.getElementById("titleD");

Causa.addEventListener('click',()=>{
    console.log(Causa.value);
    console.log(Causa);
    document.getElementById("CCausa").innerHTML=Causa.value;
})


btnCerrar.addEventListener("click",()=>{
    modal.closest();
})





    
// botones paypal

paypal.Buttons({
  // Order is created on the server and the order id is returned
  createOrder() {
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
    .then((response) => response.json())
    .then((order) => order.id);
  },
  // Finalize the transaction on the server after payer approval
  onApprove(data) {
    return fetch("/my-server/capture-paypal-order", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        orderID: data.orderID
      })
    })
    .then((response) => response.json())
    .then((orderData) => {
      // Successful capture! For dev/demo purposes:
      console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
      const transaction = orderData.purchase_units[0].payments.captures[0];
      alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
      // When ready to go live, remove the alert and show a success message within this page. For example:
      // const element = document.getElementById('paypal-button-container');
      // element.innerHTML = '<h3>Thank you for your payment!</h3>';
      // Or go to another URL:  window.location.href = 'thank_you.html';
    });
  }
}).render('#paypal-button-container');




}
// al clickar en un blog se expande y ocupa toda la pagina
const elementosBlog=document.querySelectorAll(".tituloblog");
if(elementosBlog!=null){

console.log(document.getElementsByClassName("blog"));
console.log(elementosBlog);



elementosBlog.forEach(e => {

  e.addEventListener('click', () => {

   insertar= e.parentNode.outerHTML;
    console.log(e.parentNode);
 
    document.getElementById("borrar").remove();

  insertar+=`<footer>
  <div  class=" pie ">
      <div  >
        <div class="prueba">
        <img id="socialMedia"  src="./img/facebook.png" ></img>
        <img  id="socialMedia"  src="./img/instgram3.png" ></img>
        </div>
      </div>
    </div>
    </footer>`;
    document.getElementById("contenido").innerHTML=insertar;
   elementoCambiar= document.getElementById(e.parentNode.getAttribute("id"));
   console.log(elementoCambiar);
   elementoCambiar.setAttribute('class','blog2');

     
  })
})
}



// seleccionas un genero en tienda y se borra lo que hubiera y muestra los que has seleccionado

const generoTienda=document.querySelectorAll(".genres");
if(generoTienda!=null){
console.log(generoTienda);

  generoTienda.forEach(nombregeneros => {
     nombregeneros.addEventListener('click',()=>{
     var  genero2=nombregeneros.innerHTML;
 
      


 

var padre= document.getElementById("formularioTienda");
var elemento=document.createElement("INPUT");
elemento.setAttribute("type","text");
elemento.setAttribute("name","valorSesion");
elemento.setAttribute("value",genero2);

padre.appendChild(elemento);
padre.submit();
document.getElementById("borrar").remove();

})
  });
}

// calcular precio total del carrito
  const CantidadCarrito=document.querySelectorAll(".cantidadCarrito");

  console.log(CantidadCarrito);
   var cantidad=0;
  if(CantidadCarrito!=null){
    const PrecioCarrito=document.querySelectorAll(".precioCarrito");
   var padre2= document.getElementById("carritoFORM");
    CantidadCarrito.forEach(cantidades => {
    
      
    cantidad=cantidad+(parseInt(cantidades.value)*parseInt(cantidades.previousElementSibling.previousElementSibling.previousElementSibling.innerText));
    console.log(cantidad);
  cantidades.addEventListener('click',()=>{
    cantidad=0;
    CantidadCarrito.forEach(cantidades1 =>{
      console.log(cantidades1);
     
      cantidad=cantidad+(parseInt(cantidades1.value)*parseInt(cantidades1.previousElementSibling.previousElementSibling.previousElementSibling.innerText));
    })
    document.getElementById("CTOTAL").innerText="PrecioTotal:"+cantidad+"euros";
   
})
document.getElementById("CTOTAL").innerText="PrecioTotal: "+cantidad+" euros";
    // console.log(cantidades.previousElementSibling.previousElementSibling.previousElementSibling.innerText);
    
    })
   

  
}
const QuitarProducto=document.querySelectorAll(".BCarrito");

const insertarProductoAEliminar=document.getElementById("bCarrito2");
const insertarProductoAEliminar2=document.getElementById("elementoseleccionado");
var padre3= document.querySelector("#carritoFORM2");
console.log(document.getElementById("bCarrito2"));
// quitar un producto d un carrito

QuitarProducto.forEach(quitar => {

quitar.addEventListener('click', () => {
quitar.style.backgroundColor='red';

  console.log(quitar.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value);
  insertarProductoAEliminar2.value=quitar.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.value;

  

  if(insertarProductoAEliminar.value!="borrar"){
    console.log(padre3);
   console.log(insertarProductoAEliminar.value);
//  padre3.submit();
 

  //  var a = setInterval(function(){ padre3.submit(); clearInterval(a);}, 3000);





  }

  


})
  })

const menu=document.getElementsByClassName("menu navbar").item(0);
console.log(menu);
const padre=document.body;
console.log(padre);
padre.prepend(menu);
padre.style.backgroundColor="rgb(125,20,107)";




