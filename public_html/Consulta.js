//Consulta al servidor  
  function  Consultar(frm){
    var tr = document.getElementById("trs");
    tr.innerHTML = "<td colspan='6'>Cargando...</td>";
    var form = document.getElementById(frm);
      form.addEventListener("submit", async(submit)=>{
    submit.preventDefault();
    var Data = new FormData(form);
    var request = "../src/controlers/Controler_Alumnos.php?Code="+Data.get("TxtCode");  
    //_____enviar datos al servidor__
    const response = await fetch(request);
    try {
       switch (response.status) {
        case 200:
            var data = response.json();
            data.then((r)=>{
                //mostrarlos al cliente
                ShowTable(r,true);
            });
            data.catch((e)=>{
                console.log(e)
            });
            break;
            case 204:
    var r = {
        "Response": "No se encontraron registros"
    };
    ShowTable(r, false);

    // Cambiar el texto del mensaje dentro del dialog
    var dialog = document.querySelector("dialog");
    var dialogMessage = dialog.querySelector("p");
    dialogMessage.textContent = "No se encontraron registros. Por favor, intente nuevamente.";

    // Mostrar el fondo oscuro y el dialog
    var backdrop = document.querySelector(".dialog-backdrop");
    backdrop.classList.add("active");
    dialog.show();

    // Ocultar el fondo oscuro y el dialog después de unos segundos
    setTimeout(() => {
        dialog.close();
        backdrop.classList.remove("active");
    }, 3000); // 3000 ms = 3 segundos

    break;
                case 400:
                    var data = response.json();
                    data.then((r)=>{
                        console.log(r);
                    });
                    data.catch((e)=>{
                        console.log(e)
                    });
                    break;
                    case 500:
                        alert("Ocurrio un error inesperado,Vuelva a intentarlo mas tarde");
                        var data = response.json();
                        data.then((r)=>{
                            console.log(r);
                        });
                        data.catch((e)=>{
                            console.log(e)
                        });
                        break;
        default:
            break;
       }
        
    } catch (error) {
       
        console.error(error.message)
        
    }
    


});

}

function info(info) {  
    var div = document.getElementById(info);
    div.classList.add("active");
    div.addEventListener('mouseleave',()=>{
    div.classList.remove("active");
  });
}

function ShowTable(json,flag) {
var tr = document.getElementById("trs");
    tr.innerHTML = "<td colspan='6'>Cargando...</td>";
var result="";
for (let clave in json) {
//si flag es true ,se encontraron registros
    if (flag) {

    if (json[clave]=='0') {
        json[clave]="-";
    };
     result += "<td>"+`${json[clave]}` +"</td>";
    }else{
    //si no ingnora y muestra lo que trajo
        //alert('No se encontraron registros ,por favor consulte con su administrador si se trata de un error');
    result = "<td colspan='6'>"+`${json[clave]}`+"</td>";
    }
}
tr.innerHTML=result;

};
