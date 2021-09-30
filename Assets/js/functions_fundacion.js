let tableFundaciones;
let rowTable = "";

let divLoading = document.querySelector("#divLoading");
$(document).on('focusin', function(e) {//Este codigo lo que hace es superponer y/o desbloquear los links para
    if ($(e.target).closest(".tox-dialog").length) {//editar los campos para poder crear enlaces
        e.stopImmediatePropagation();//dichos enlaces se colocan el el area de texto con la
    }//libreria tynmce
});
document.addEventListener('DOMContentLoaded', function(){ //Agregamos los eventos

    tableFundaciones = $('#tableFundaciones').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Fundaciones_admin/getFundaciones",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_beneficio"},
            {"data":"nombre_org"},
            {"data":"codigo"},
            {"data":"premio"},
            {"data":"direccion"},
            {"data":"status"},
            {"data":"opciones"}
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Exportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Exportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Exportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "responsive":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

    if(document.querySelector("#formFundaciones")){//Con este codigo guardamos los datos en la BD
        let formFundaciones = document.querySelector("#formFundaciones");
        formFundaciones.onsubmit = function(e) {
            e.preventDefault();
            let intFundacion = document.querySelector('#idFundacion').value;
            let strNombre = document.querySelector('#txtNombre').value;
            let intCodigo = document.querySelector('#txtCodigo').value;
            let strPremio = document.querySelector('#txtPremio').value;
            let strDireccion = document.querySelector('#txtDireccion').value;
            let strDescripcion = document.querySelector('#txtDescripcionF').value;
            let intStatus = document.querySelector('#listStatus').value;

            if(strNombre == '' || intCodigo == '' || strPremio == '' || strDireccion == '')
            {//En la linea anterior el orden no importa
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
 
            divLoading.style.display = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Fundaciones_admin/setFundacion'; 
            let formData = new FormData(formFundaciones);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {

                        swal("", objData.msg ,"success");
                        document.querySelector("#idFundacion").value = objData.id_beneficio;
                        document.querySelector("#containerGallery").classList.remove("notblock");

                        if(rowTable == ""){
                            tableFundaciones.api().ajax.reload();
                        }else{//AQUI ACTUALIZAMOS LOS DATOS DEL PRODUCTO
                           htmlStatus = intStatus == 1 ? //IF TERNARIO
                            '<span class="badge badge-danger">Pendiente por entregar</span>' : 
                            '<span class="badge badge-success">Entregado exitosamente</span>';

                            rowTable.cells[0].textContent = intFundacion;
                            rowTable.cells[1].textContent = strNombre;
                            rowTable.cells[2].textContent = intCodigo;
                            rowTable.cells[3].textContent = strPremio;
                            rowTable.cells[4].textContent = strDireccion;
                            rowTable.cells[5].innerHTML =  htmlStatus;
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

    if(document.querySelector(".btnAddImageFundacion")){
       let btnAddImageFundacion =  document.querySelector(".btnAddImageFundacion");
       btnAddImageFundacion.onclick = function(e){
        let key = Date.now();
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
}, false);

tinymce.init({
    selector: '#txtDescripcionF',
    width: "100%",
    height: 200,    
    statubar: true,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
});

function fntInputFile(){
    let inputUploadfile = document.querySelectorAll(".inputUploadfile");
    inputUploadfile.forEach(function(inputUploadfile) {
        inputUploadfile.addEventListener('change', function(){
            let idFundacion = document.querySelector("#idFundacion").value;
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
                    let ajaxUrl = base_url+'/Fundaciones_admin/setImage'; 
                    let formData = new FormData();
                    formData.append('id_beneficio',idFundacion);
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

function fntDelItem(element){
    let nameImg = document.querySelector(element+' .btnDeleteImage').getAttribute("imgname");
    let idFundacion = document.querySelector("#idFundacion").value;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Fundaciones_admin/delFile'; 

    let formData = new FormData();//Crear formulario con javascrip
    formData.append('id_beneficio',idFundacion);
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

function fntViewInfo(idIntBeneficio){
    let idBeneficio = idIntBeneficio;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Fundaciones_admin/getFundacion/'+idBeneficio;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let htmlImage = "";
                let objFundacion = objData.data;
                let estado = objFundacion.status == 1 ? 
                '<span class="badge badge-danger">Pendiente por entregar</span>' : 
                '<span class="badge badge-success">Entregado exitosamente</span>';

                document.querySelector("#celNombre").innerHTML = objFundacion.nombre_org;
                document.querySelector("#celCodigo").innerHTML = objFundacion.codigo;
                document.querySelector("#celPremio").innerHTML = objFundacion.premio;
                document.querySelector("#celFecha").innerHTML = objFundacion.fecha;
                document.querySelector("#celDireccion").innerHTML = objFundacion.direccion;
                document.querySelector("#celDescripcion").innerHTML = objFundacion.descripcion;
                document.querySelector("#celStatus").innerHTML = estado;

                if(objFundacion.images.length > 0){
                    let objImg = objFundacion.images;
                    for (let g = 0; g < objImg.length; g++) {
                        htmlImage +=`<img src="${objImg[g].url_image}"></img>`;
                    }
                }
                document.querySelector("#celFotos").innerHTML = htmlImage; 
                $('#modalViewFundaciones').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntEditInfo(element,idBeneficio){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Fundación";//Cambio de apariencia del modal
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Fundaciones_admin/getFundacion/'+idBeneficio;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let htmlImage = "";
                let objFundacion = objData.data;
                
                document.querySelector("#idFundacion").value = objFundacion.id_beneficio;
                document.querySelector("#txtNombre").value = objFundacion.nombre_org;
                document.querySelector("#txtCodigo").value = objFundacion.codigo;
                document.querySelector("#txtPremio").value = objFundacion.premio;
                document.querySelector("#txtDireccion").value = objFundacion.direccion;
                document.querySelector("#txtDescripcionF").value = objFundacion.descripcion;
                document.querySelector("#listStatus").value = objFundacion.status;
                tinymce.activeEditor.setContent(objFundacion.descripcion);

                if(objFundacion.images.length > 0){
                    let objImg = objFundacion.images;
                    for (let p = 0; p < objImg.length; p++) {
                        let key = Date.now()+p;
                        htmlImage +=`<div id="div${key}">
                            <div class="prevImage">
                            <img src="${objImg[p].url_image}"></img>
                            </div>
                            <button type="button" class="btnDeleteImage" onclick="fntDelItem('#div${key}')" imgname="${objImg[p].img}">
                            <i class="fas fa-trash-alt"></i></button></div>`;
                    }
                }
                document.querySelector("#containerImages").innerHTML = htmlImage;
                document.querySelector("#containerGallery").classList.remove("notblock"); 
                $('#modalFormFundaciones').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }    
    }
}


function fntDelInfo(idBeneficio){

    swal({
        title: "Eliminar Fundación",
        text: "¿Realmente quiere eliminar la fundación?",
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
            let ajaxUrl = base_url+'/Fundaciones_admin/delFundacion'; //Controlador y metodo
            let strData = "idBeneficio="+idBeneficio;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableFundaciones.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function openModal()
{
    document.querySelector('#idFundacion').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Institución";
    document.querySelector("#formFundaciones").reset();
    document.querySelector("#containerGallery").classList.add("notblock");
    document.querySelector("#containerImages").innerHTML = "";
    $('#modalFormFundaciones').modal('show');
}