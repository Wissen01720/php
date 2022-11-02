function imprimirElemento(elemento) {
    var ventana = window.open('', 'print', 'height=400,width=600');
    ventana.document.write('<link rel="stylesheet" href="style.css">');
    ventana.document.write('</head><body >');
    ventana.document.write(elemento.innerHTML);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.onload = function () {
      ventana.print();
    }
    return true;
  }

document.querySelector("#btnImprimirFactura").addEventListener("click", function() {
    var div = document.querySelector("#oculto-impresion");
    imprimirElemento(div);
  });

document.querySelector("#btnImprimirDiv").addEventListener("click", function() {
    var div = document.querySelector("#container");
    imprimirElemento(div);
  });  