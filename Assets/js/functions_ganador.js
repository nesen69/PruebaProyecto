let tableGanadores;
let rowTable = "";

document.addEventListener('DOMContentLoaded', function(){ //Agregamos los eventos

	tableGanadores = $('#tableGanadores').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Ganadores_admin/getGanadores",
            "dataSrc":""
        },
        "columns":[
	        {"data":"idsorteo"},
	        {"data":"nombresc"},
	        {"data":"identificacion"},
	        {"data":"telefono"},
	        {"data":"email_user"},
            {"data":"direccion"},
            {"data":"premio"},
            {"data":"status"},
            {"data":"opciones"}
        ],
        
        "columnDefs": [
	        { 'className': "textcenter", "targets": [ 6 ] },
	        { 'className': "textcenter", "targets": [ 7 ] }
        ], 

        'dom': 'lBfrtip',
        'buttons': [
            {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Exportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Exportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Exportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        }
        ],
        "responsive":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });


    if(document.querySelector("#formGanador")){

        let formGanador = document.querySelector("#formGanador");
        formGanador.onsubmit = function(e) {
            e.preventDefault();
            let strIdSortteo = document.querySelector('#idGanador').value;
            let strIdPersona = document.querySelector('#idPersona').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let strApellido = document.querySelector('#txtApellido').value;
            let intCedula = document.querySelector('#txtIdentificacion').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let strEmail = document.querySelector('#txtEmail').value;
            let strDireccion = document.querySelector('#txtDireccion').value;
            let strPremio = document.querySelector('#txtNombrePremio').value;
            /*let intListSorteo = document.querySelector('#listSorteo').value;*/
            let intStatus = document.querySelector('#listStatus').value;
            if(strNombre == '' || strApellido == '' || intCedula == '' || intTelefono == '' || strEmail == '' || strDireccion == '' || strPremio == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            
            divLoading.style.display = "flex";         
            let request = (window.XMLHttpRequest) ? 
            new XMLHttpRequest() : 
            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ganadores_admin/setGanador'; 
            let formData = new FormData(formGanador);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                  
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("", objData.msg ,"success");
                        document.querySelector("#idGanador").value = objData.idsorteo;
                        document.querySelector("#containerGallery").classList.remove("notblock");
                        //La linea anterior es para remover la clase notblock y asi poder agregar fotos
                        if(rowTable == ""){
                            tableGanadores.api().ajax.reload();
                        }else{//AQUI ACTUALIZAMOS LOS DATOS DEL PRODUCTO
                           htmlStatus = intStatus == 1 ? //IF TERNARIO
                            '<span class="badge badge-danger">Pendiente</span>' : 
                            '<span class="badge badge-success">Entregado</span>';

                            rowTable.cells[0].textContent = strIdSortteo;
                            rowTable.cells[1].textContent = strNombre+' '+strApellido;
                            rowTable.cells[2].textContent = intCedula;
                            rowTable.cells[3].textContent = intTelefono;
                            rowTable.cells[4].textContent = strEmail;
                            rowTable.cells[5].textContent = strDireccion;
                            rowTable.cells[6].textContent = strPremio;
                            rowTable.cells[7].innerHTML =  htmlStatus;
                            rowTable = ""; 
                        }
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

/*function fntGuaradaGanadorFinal(){*/


/*}*/

if(document.querySelector(".btnAddImageGanador")){
     let btnAddImageGanador =  document.querySelector(".btnAddImageGanador");
     btnAddImageGanador.onclick = function(e){
        let key = Date.now();//Retorna fecha y hora incluyendo los segundos
        
        let newElement = document.createElement("div");
        newElement.id= "div"+key;
        newElement.innerHTML = `
        <div class="prevImage"></div>
        <input type="file" name="foto" id="img${key}" class="inputUploadfile">
        <label for="img${key}" class="btnUploadfile"><i class="fas fa-upload "></i></label>
        <button class="btnDeleteImage notblock" type="button" onclick="fntDelItem('#div${key}')"><i class="fas fa-trash-alt"></i></button>`;
        document.querySelector("#containerImages").appendChild(newElement);
        document.querySelector("#div"+key+" .btnUploadfile").click();
        fntInputFile();
    }
}
    fntInputFile();
    /*fntCategorias();*/
}, false);



function fntConsulta(){
	
	let formGanador = document.querySelector("#formGanador");
		formGanador.onsubmit = function(e) {
			e.preventDefault();
			let strIdentificacion = document.querySelector('#txtIdentificacion').value;			

			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url+'/Ganadores_admin/getGanador/'+strIdentificacion; 
			let formData = new FormData(formGanador);
			request.open("POST",ajaxUrl,true);
			request.send(formData);
			request.onreadystatechange = function(){
				if(request.readyState == 4 && request.status == 200){

					let objData = JSON.parse(request.responseText);
					//console.log(objData);
					if(objData.status){
                        document.querySelector("#idPersona").value = objData.idpersona;
						document.querySelector("#txtNombre").value = objData.nombres;
						document.querySelector("#txtApellido").value = objData.apellidos;
						document.querySelector("#txtTelefono").value = objData.telefono;
						document.querySelector("#txtEmail").value = objData.email_user;

					}else{
						swal("Error", objData.msg , "error");
					}
				}
			}
		}
	}

function fntInputFile(){//TRABAJA DE LA MANO CON if(document.querySelector(".btnAddImageGanador")){ para cragar imagenes
    let inputUploadfile = document.querySelectorAll(".inputUploadfile");
    inputUploadfile.forEach(function(inputUploadfile) {
        inputUploadfile.addEventListener('change', function(){
            let idGanador = document.querySelector("#idGanador").value;
            /*alert(idGanador);*/
            let parentId = this.parentNode.getAttribute("id");
            let idFile = this.getAttribute("id");            
            let uploadFoto = document.querySelector("#"+idFile).value;
            let fileimg = document.querySelector("#"+idFile).files;
            let prevImg = document.querySelector("#"+parentId+" .prevImage");
            let nav = window.URL || window.webkitURL;
            if(uploadFoto !=''){
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    prevImg.innerHTML = "Archivo no válido";
                    uploadFoto.value = "";
                    return false;
                }else{
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    prevImg.innerHTML = `<img class="loading" src="${base_url}/Assets/images/loading.svg" >`;

                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    //La linea anterior se usa para implementar AJAX
                    let ajaxUrl = base_url+'/Ganadores_admin/setImage'; 
                    let formData = new FormData();
                    formData.append('idganador',idGanador);//Revisar esta
                    formData.append("foto", this.files[0]);
                    request.open("POST",ajaxUrl,true);
                    request.send(formData);
                    request.onreadystatechange = function(){
                        if(request.readyState != 4) return;
                        if(request.status == 200){
                            let objData = JSON.parse(request.responseText);
                            if(objData.status){
                                prevImg.innerHTML = `<img src="${objeto_url}">`;
                                document.querySelector("#"+parentId+" .btnDeleteImage").setAttribute("imgname",objData.imgname);
                                document.querySelector("#"+parentId+" .btnUploadfile").classList.add("notblock");
                                document.querySelector("#"+parentId+" .btnDeleteImage").classList.remove("notblock");
                            }else{
                                swal("Error", objData.msg , "error");
                            }
                        }
                    }

                }
            }

        });
    });
}

function fntGuaradaGanador(){ //Soy quien guarda
	if(document.querySelector("#formGanador")){
		let formGanador = document.querySelector("#formGanador");
		formGanador.onsubmit = function(e) {
			e.preventDefault();
            let strIdSortteo = document.querySelector('#idGanador').value;
            let strIdPersona = document.querySelector('#idPersona').value;
			let intCedula = document.querySelector('#txtIdentificacion').value;
			/*let strNombre = document.querySelector('#txtNombre').value;
			let strApellido = document.querySelector('#txtApellido').value;
			let strEmail = document.querySelector('#txtEmail').value;
			let intTelefono = document.querySelector('#txtTelefono').value;*/
            let strDireccion = document.querySelector('#txtDireccion').value;
			let strPremio = document.querySelector('#txtNombrePremio').value;
			/*let intListSorteo = document.querySelector('#listSorteo').value;*/
			let intStatus = document.querySelector('#listStatus').value;

			if( intCedula == '' || strDireccion == '' || strPremio == '')
            {//En la linea anterior el orden no importa
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
           // divLoading.style.display = "flex";
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ganadores_admin/setGanador'; 
            let formData = new FormData(formGanador);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
            	if(request.readyState == 4 && request.status == 200){

            		let objData = JSON.parse(request.responseText);
					

            		if(objData.status){

                        swal("", objData.msg ,"success");
                        document.querySelector("#idGanador").value = objData.idsorteo;
                        document.querySelector("#containerGallery").classList.remove("notblock");

                        if(rowTable == ""){
                            tableGanadores.api().ajax.reload();
                        }else{//AQUI ACTUALIZAMOS LOS DATOS DEL PRODUCTO
                           htmlStatus = intStatus == 1 ? //IF TERNARIO
                            '<span class="badge badge-danger">Pendiente</span>' : 
                            '<span class="badge badge-success">Entregado</span>';

                            rowTable.cells[0].textContent = strIdSortteo;
                            rowTable.cells[1].textContent = strNombre+' '+strApellido;
                            rowTable.cells[2].textContent = intCedula;
                            rowTable.cells[3].textContent = intTelefono;
                            rowTable.cells[4].textContent = strEmail;
                            rowTable.cells[5].textContent = strDireccion;
                            rowTable.cells[6].textContent = strPremio;
                            /*rowTable.cells[7].innerHTML = intListSorteo;*/
                            rowTable.cells[7].innerHTML =  htmlStatus;
                            rowTable = ""; 
                        }


            			/*$('#modalGanador').modal("hide");
            			formGanador.reset();
            			swal("Ganadores", objData.msg ,"success");*/
                       // tableClientes.api().ajax.reload();
                   }else{
                   	swal("Error", objData.msg , "error");
                   }
               }
               //divLoading.style.display = "none";
               return false;
           }
       }
   }
}

function fntDelItem(element){
    let nameImg = document.querySelector(element+' .btnDeleteImage').getAttribute("imgname");
    let idGanador = document.querySelector("#idGanador").value;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ganadores_admin/delFile'; 

    let formData = new FormData();//Crear formulario con javascrip
    formData.append('idsorteo',idGanador);
    formData.append("file",nameImg);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState != 4) return;
        if(request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let itemRemove = document.querySelector(element);
                itemRemove.parentNode.removeChild(itemRemove);//Remover el elemento hijo, eliminamos la foto que sale al final del modal
               // swal("", objData.msg ,"success");
            }else{
                swal("", objData.msg , "error");
            }
        }
    }
}

function fntViewInfo(idsorteo){

    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ganadores_admin/getGanadorFinal/'+idsorteo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            //console.log(objData);
            if(objData.status)

            {
                let htmlImage = "";
                let objSorteo = objData.data;


                document.querySelector("#nroSorteo").innerHTML = objSorteo.idsorteo;
                document.querySelector("#celNombre").innerHTML = objSorteo.nombres;
                document.querySelector("#celApellido").innerHTML = objSorteo.apellidos;
                document.querySelector("#celCedula").innerHTML = objSorteo.identificacion;
                document.querySelector("#celTelefono").innerHTML = objSorteo.telefono;
                document.querySelector("#celEmail").innerHTML = objSorteo.email_user;
                document.querySelector("#celDireccion").innerHTML = objSorteo.direccion;
                document.querySelector("#celPremio").innerHTML = objSorteo.premio;
               /* document.querySelector("#celTipoSorteo").innerHTML = objSorteo.tipo_sorteo;*/
                document.querySelector("#celEstado").innerHTML = objSorteo.status;


                if(objSorteo.images.length > 0){
                    let objSorteos = objSorteo.images;
                    for (let g = 0; g < objSorteos.length; g++) {
                        htmlImage +=`<img src="${objSorteos[g].url_image}"></img>`;
                    }
                }
                document.querySelector("#celFotos").innerHTML = htmlImage;
                $('#modalViewGanador').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    } 
}

function fntEditInfo(element,idSorteo){//junto con this en el boton editar del controlador se usa este "element" y tambien la siguiente linea
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar ganador";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-primary");//OJO este boton tiene evento
    document.querySelector("#pru").classList.replace("notblock", "siBlock");
    document.querySelector("#prueba").classList.replace("siBlock", "notblock");
    document.querySelector('#btnTextpru').innerHTML ="Actualizar";
    
    $('#btnBuscar').hide(1);
    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Ganadores_admin/getGanadorFinal/'+idSorteo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status){

                let htmlImage = "";
                let objSorteo = objData.data;

                document.querySelector("#idGanador").value = objSorteo.idsorteo;
                document.querySelector("#txtIdentificacion").value = objSorteo.identificacion;
                document.querySelector("#txtNombre").value = objSorteo.nombres;
                document.querySelector("#txtApellido").value = objSorteo.apellidos;
                document.querySelector("#txtTelefono").value = objSorteo.telefono;
                document.querySelector("#txtEmail").value = objSorteo.email_user;
                document.querySelector("#txtDireccion").value = objSorteo.direccion;
                document.querySelector("#txtNombrePremio").value = objSorteo.premio;
                
                if(objSorteo.images.length > 0){
                    let objGanadores = objSorteo.images;
                    for (let p = 0; p < objGanadores.length; p++) {
                        let key = Date.now()+p;
                        htmlImage +=`<div id="div${key}">
                            <div class="prevImage">
                            <img src="${objGanadores[p].url_image}"></img>
                            </div>
                            <button type="button" class="btnDeleteImage" onclick="fntDelItem('#div${key}')" imgname="${objGanadores[p].img}">
                            <i class="fas fa-trash-alt"></i></button></div>`;
                    }
                }
                document.querySelector("#containerImages").innerHTML = htmlImage;
                document.querySelector("#containerGallery").classList.remove("notblock");           
                $('#modalGanador').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

/*function fntCategorias(){
    if(document.querySelector('#listSorteo')){
        let ajaxUrl = base_url+'/Ganadores_admin/getSelectSorteos';
        let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listSorteo').innerHTML = request.responseText;
                $('#listSorteo').selectpicker('render');
            }
        }
    }
}*/


function fntDelInfo(idSorteo){
    swal({
        title: "Eliminar Sorteo",
        text: "¿Realmente quiere eliminar el sorteo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Ganadores_admin/delSorteo';
            let strData = "idSorteo="+idSorteo;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableGanadores.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }
    });
}

function openModal(){
    $('#btnBuscar').show(1);

    document.querySelector('#btnActionForm').classList.replace("btn-dark","btn-primary");
    document.querySelector("#prueba").classList.replace("notblock", "siBlock");
    document.querySelector("#pru").classList.replace("siBlock", "notblock");
    document.querySelector('#idGanador').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnTextprueba').innerHTML ="Guardar";
    document.querySelector('#btnTextBuscar').innerHTML ="Buscar"; //Cambiamos el texto
    document.querySelector('#titleModal').innerHTML ="Nuevo ganador"; //Cambiamos el titulo
    document.querySelector('#formGanador').reset(); //Reseteamos el formulario "Limpiar todos los campos"
    document.querySelector("#containerGallery").classList.add("notblock");
    document.querySelector("#containerImages").innerHTML = "";

    $('#modalGanador').modal('show');
    /*$('#modalGanadorFinal').modal('show');*/
}



