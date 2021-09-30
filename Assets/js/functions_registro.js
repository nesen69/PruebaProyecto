if(document.querySelector("#frmRegistroCuenta")){
    let frmRegistroCuenta = document.querySelector("#frmRegistroCuenta");
    frmRegistroCuenta.onsubmit = function(e){
        e.preventDefault();
        let strNombre = document.querySelector('#txtNombre').value;
        let strApellido = document.querySelector('#txtApellido').value;
        let intCedula = document.querySelector('#txtCedula').value;
        let strEmail = document.querySelector('#txtEmailCliente').value;
        let intTelefono = document.querySelector('#txtTelefono').value;

        if(strApellido == '' || strNombre == '' || intCedula == '' || strEmail == '' || intTelefono == '' ){
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }

        let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                swal("Atención", "Por favor verifique los campos en rojo." , "error");
                return false;
            } 
        } 
        divLoading.style.display = "flex";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Tienda/registro'; 
        let formData = new FormData(frmRegistroCuenta);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status){
                    swal({
                        title: "Registro exitoso",
                        text: "Una contraseña aleatoria fue enviada a su correo electrónico, también puede cambiar su clave en la sección Perfil",
                        type: "success",
                        confirmButtonText: "Continuar",                        
                        closeOnConfirm: false
                    }, function(isConfirm){

                        if (isConfirm){

                        window.location.reload(false);
                        }
                    });

                }else{
                    swal("Error", objData.msg , "error");
                }
            }
            divLoading.style.display = "none";
            return false;
        }
    }
}