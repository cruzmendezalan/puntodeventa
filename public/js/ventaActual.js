var arrayDeProductos = [];
var x=[];

function paginacargada(){
	generaArray();
}
function generaArray(){
	x = document.getElementsByClassName('productoslista');
	arrayDeProductos
	for (var i = 0; i < x.length; i++) {
		arrayDeProductos.push(x[i].innerHTML);
	};
	// console.log(arrayDeProductos[2]);
}

function busca(textoabuscar) {
    // var s = document.getElementById("buscar").value;
    // cadena = cadena.toUpperCase();
    var s = textoabuscar;
    s = s.toUpperCase();
    var nombres = "";
    if(s!="") {
        for(var i=0; i<arrayDeProductos.length; i++) {
            if(!(arrayDeProductos[i].indexOf(s)!=-1)) {
                nombres += arrayDeProductos[i]+"<br/>";
                x[i].style.display ="none";
            }
        }
    }
    else{
    	for(var i=0; i<arrayDeProductos.length; i++){
    		x[i].style.display ="table-cell";
    	}
    }
}

function cuantosElementos(item){
	var numeroDeItems = prompt("¿Cuantos?","1");
	if ((numeroDeItems == 0) || (numeroDeItems == '' || (numeroDeItems== " "))) {
		return;
	}
	validaExistencia(item,numeroDeItems);
	// addAVenta(item,numeroDeItems);
}

function validaExistencia(item,numeroDeItems){
	// console.log('Validando Existencia');
	var tiposDeproductos =  document.getElementsByName("idProductos");
	for (var i = 0; i < tiposDeproductos.length; i++) {
		// console.log(tiposDeproductos[i].value+ "=>" +tiposDeproductos[i].getAttribute("vid"));
		if (tiposDeproductos[i].getAttribute("vid") == item.getAttribute("vid")) {
			// console.log('Ya existia');
			tiposDeproductos[i].value = parseFloat(tiposDeproductos[i].value) + parseFloat(numeroDeItems); 
			var padreTD = tiposDeproductos[i].parentNode;
			var padreTR = padreTD.parentNode;
			generaimporte(tiposDeproductos[i],padreTR);
			return;
		}
	}
	addAVenta(item,numeroDeItems);
}

function addAVenta(obj, numeroDeItems){
	
	// var ultimorenglondenota = notadeventa.lastChild;
	// console.log("var => "+ultimorenglondenota.nodeName);
	// notadeventa.lastChild.innerHTML("algo");
	// console.log(ultimorenglondenota.nodeName);
	var notadeventa = document.getElementById("tablanotadeventa");
	var lastRowIndex = notadeventa.rows.length-1;
	if ((notadeventa.rows[lastRowIndex].firstChild.innerHTML==".") || (notadeventa.rows[lastRowIndex].firstChild.innerHTML=="")) {
		console.log('fila eliminada');
		notadeventa.deleteRow(lastRowIndex);
	}
	

	// console.log(lastRowIndex+"###");

	var nodo = document.getElementById('articulosDeVenta');
	var venta = document.createElement("tr");
	var ventaCantidad 		= document.createElement("td");
	ventaCantidad.className = "cantidad";
	var ventaDescripcion 	= document.createElement("td");
	ventaCantidad.className = "articulo";
	var ventaValorUnitario 	= document.createElement("td");
	ventaCantidad.className = "valorUnitario";
	var ventaImporte 		= document.createElement("td");
	ventaImporte.className 	= "importe";
	var ventaCantidadInput = document.createElement("input");
	ventaCantidadInput.type = "number";
	ventaCantidadInput.value = parseFloat(numeroDeItems);
	ventaCantidadInput.className = "textocentrado";
	ventaCantidadInput.name = "idProductos";
	ventaCantidadInput.setAttribute("vid",obj.getAttribute("vid"));
	ventaCantidadInput.onchange = function(){
		generaimporte(ventaCantidadInput, venta);
	};
	ventaCantidad.appendChild(ventaCantidadInput);

	
	var ventaDescripcionTexto = document.createTextNode(obj.innerHTML);
	ventaDescripcion.appendChild(ventaDescripcionTexto);
	var ventaValorUnitarioInput = document.createTextNode(obj.getAttribute("valorunitario"));
	ventaValorUnitario.appendChild(ventaValorUnitarioInput);

	var ventaImporteInput = document.createElement("input");
	ventaImporteInput.type = "text";
	ventaImporteInput.name = "importes";
	ventaImporteInput.className = "textocentrado";
	ventaImporteInput.disabled = true;
	ventaImporteInput.value = creaFloat(parseFloat(numeroDeItems)*parseFloat(obj.getAttribute("valorunitario")));
	
	ventaImporte.appendChild(ventaImporteInput);

	venta.appendChild(ventaCantidad);
	venta.appendChild(ventaDescripcion);
	venta.appendChild(ventaValorUnitario);
	venta.appendChild(ventaImporte);

	// list.insertBefore(newItem, list.childNodes[0]);
	nodo.insertBefore(venta,nodo.childNodes[1])
	// nodo.appendChild(venta);
}
function generaimporte(inputNumeroDeItems, filaDeventa){
	var importe;
	var numDeProductos = parseFloat(inputNumeroDeItems.value); //obtenemos el # de items
	if ((numDeProductos == 0) || (numDeProductos == '')) {
	 	var tbody  = filaDeventa.parentNode;
	 	tbody.removeChild(filaDeventa);
	 	generaSubtotal();
	 	return;
	} 
	var fila  = filaDeventa;
	var celdaImporte  = fila.lastChild;// El ultimo <td> de la tabla de venta
	var celdaValorUnitario = celdaImporte.previousSibling;
	// console.log('valor unitario => '+ celdaValorUnitario.innerHTML);
	var celdaImporteInput = celdaImporte.firstChild;
	// console.log('Llamando a celda importe');
	celdaImporteInput.value = creaFloat(parseFloat(celdaValorUnitario.innerHTML) * numDeProductos);
	generaSubtotal();
	
}


function generaSubtotal(){
	// console.log('Generando Subtotal');
	var importes = document.getElementsByName('importes');
	var subtotal = 0;
	for (var i = 0; i < importes.length; i++) {
			// console.log(parseFloat(importes[i].value));
			subtotal = parseFloat(subtotal) + parseFloat(importes[i].value);
			subtotal = creaFloat(subtotal);
		}
	document.getElementById('subtotal').value = subtotal;
	subtotal = parseFloat(subtotal);
	var iva = document.getElementById("iva").value;
	if (iva  == '') {
		document.getElementById("iva").value = 0;
		iva = 0;
	}
	var descuento = creaFloat(document.getElementById('descuento').value);
	descuento = (subtotal/100)*descuento;
	var subtotalConDescuento = subtotal - descuento;
	// console.log(descuento);
	var total = creaFloat((subtotalConDescuento) + ((subtotalConDescuento)/100)*parseInt( iva ));
	document.getElementById('total').value = total;
	
	document.getElementById('objetobuscado').value = "";
	busca("");	
}

function creaFloat(numero){
	return parseFloat(parseFloat(numero)+0.001).toFixed(2);
}

function regenera(){
	var notadeventa = document.getElementById('articulosDeVenta');
	var lastRowIndex = notadeventa.rows.length-1;
	for (var i = 0; i < lastRowIndex; i++) {
		notadeventa.deleteRow(0);
	};
	for (var i = 0; i < 10; i++) {
		var nuevafila = notadeventa.insertRow(1);
		var celda1 = nuevafila.insertCell(0);
		celda1.innerHTML="."
		var celda2 = nuevafila.insertCell(1);
		var celda3 = nuevafila.insertCell(1);
		var celda4 = nuevafila.insertCell(1);

	};
	document.getElementById('folio').value = parseInt(document.getElementById('folio').value)+ 1 ;
}

function ajax(obj){
	// obj.preventDefault();
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		console.log("Status 200"+xmlhttp.responseText);
    		regenera();
    	}
  	}

  	xmlhttp.open('POST','nuevaventa',true);
    xmlhttp.setRequestHeader('Content-type','application/json; charset=utf-8');
	var productos;
	// console.log("ITEMS =>"+productos);
	var productosJSON = JSON.stringify(getProductos());
	productos = '{"productos":'+productosJSON
				+ ',"iva":"'+document.getElementById('iva').value+'"'
				+ ',"subtotal":"'+document.getElementById('subtotal').value+'"'
				+ ',"total":"'+document.getElementById('total').value+'"'
				+ ',"descuento":"'+document.getElementById('descuento').value+'"'
	+'}';
	// console.log("Respuesta de Servidor :"+productos);
	xmlhttp.send(productos);

	var resultado = document.createTextNode("Venta Almacenada,[Click para cerrar]");
	var h1 = document.createElement("h3");
	h1.className="spannuevaventa";
	h1.onclick = function () {
    	this.parentElement.removeChild(this);
	};
	h1.appendChild(resultado);
	document.getElementById("mensaje").appendChild(h1);
}

function getProductos(){
	var items = document.getElementsByName("idProductos");

	console.log(items[0].nodeName);
	var productosDeVenta = [];
	for(var i = 0, total = items.length; i < total; i++){
		// console.log(items[i].getAttribute("vid")+"=>"+items[i].value);
		var item = {
			"id": items[i].getAttribute("vid"),
			"cantidad":items[i].value,
		};

		productosDeVenta.push(item);
	}
	// console.log(datos);
	return productosDeVenta;
}
function oscurecer(mas) {
  obj = document.getElementById('im');
  fil += mas;
  obj.style.filter = 'alpha(opacity='+fil+')';
  obj.style.MozOpacity= fil / 100;
  if (fil==100 || fil==20) {
    clearInterval(pepe);
    fil=20;
  }
}