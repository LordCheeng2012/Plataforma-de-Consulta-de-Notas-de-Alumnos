//Consulta al servidor  
  function  Consultar(frm){

    var form = document.getElementById(frm);
      form.addEventListener("submit", async(submit)=>{
    submit.preventDefault();
    var Data = new FormData(form);
    var request = "../src/controlers/Controler_Alumnos.php?Nombre="+Data.get("TxtNombre")+"&Apellidos="+Data.get("TxtApellido");  
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
               
                var r ={
                  "Response":"No se encontraron registros"  
                };
                
                ShowTable(r,false);
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
var result="";
tr.innerHTML = "<td colspan='5'>Cargando...</td>";
for (let clave in json) {
//si flag es true ,se encontraron registros
    if (flag) {

    if (json[clave]==null) {
        continue;
    };
     result += "<td>"+`${json[clave]}` +"</td>";
    }else{
    //si no ingnora y muestra lo que trajo
    result = "<td colspan='5'>"+`${json[clave]}`+"</td>";
      }
}
tr.innerHTML=result;
}
