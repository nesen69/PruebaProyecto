let tableApoyo;
let rowTable = "";
$(document).on('focusin', function(e) {//Este codigo lo que hace es superponer y/o desbloquear los links para
    if ($(e.target).closest(".tox-dialog").length) {//editar los campos para poder crear enlaces
        e.stopImmediatePropagation();//dichos enlaces se colocan el el area de texto con la
    }//libreria tynmce
});
    tableApoyo = $('#tableApoyo').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Apoyo_admin/getApoyos",
            "dataSrc":""
        },
        "columns":[
            {"data":"idapoyo"},
            {"data":"nombre_org"},
            {"data":"codigo"},
            {"data":"responsable"},
            {"data":"cedula"},
            {"data":"telefono"},
            {"data":"status"}, 
            {"data":"options"}              
        ],        

        /*'dom': 'lBfrtip',
        'buttons': [
            {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Exportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Exportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Exportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2] 
            }
        }
        ],*/
        "responsive":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

window.addEventListener('load', function() {

    if(document.querySelector("#formApoyo")){
        let formApoyo = document.querySelector("#formApoyo");
        formApoyo.onsubmit = function(e) {
            e.preventDefault();
            let strNombreOrg = document.querySelector('#txtNombreOrg').value;
            let intCodigoOrg = document.querySelector('#txtCodigoOrg').value;
            let strResponsable = document.querySelector('#txtResponsable').value;
            let intCedula = document.querySelector('#txtCedula').value;
            let intTelefono = document.querySelector('#txtTelefono').value;
            let intListSorteos = document.querySelector('#listSorteos').value;
            let intStatus = document.querySelector('#listStatus').value;
            
            //alert(intListSorteos);
            
            if(strNombreOrg == '' || intCodigoOrg == '' || strResponsable == '' || intCedula == '' || intTelefono == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            
            divLoading.style.display = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ? 
            new XMLHttpRequest() : 
            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Apoyo_admin/setApoyo'; 
            let formData = new FormData(formApoyo);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                  
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("", objData.msg ,"success");
                        document.querySelector("#idApoyo").value = objData.idapoyo;
                        document.querySelector("#containerGallery").classList.remove("notblock");
                        
                        //La linea anterior es para remover la clase notblock y asi poder agregar fotos
                        if(rowTable == ""){
                            tableApoyo.api().ajax.reload();
                        }else{//AQUI ACTUALIZAMOS LOS DATOS DEL PRODUCTO
                           htmlStatus = intStatus == 1 ? //IF TERNARIO
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';


                            rowTable.cells[1].textContent = strNombreOrg;
                            rowTable.cells[2].textContent = intCodigoOrg;
                            rowTable.cells[3].textContent = strResponsable;
                            rowTable.cells[4].textContent = intCedula;
                            rowTable.cells[5].textContent = intTelefono;
                            rowTable.cells[6].innerHTML =  htmlStatus;
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

    if(document.querySelector(".btnAddImageApoyo")){
       let btnAddImageApoyo =  document.querySelector(".btnAddImageApoyo");
       btnAddImageApoyo.onclick = function(e){
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
        fntListaSorteos();
    }, false);

tinymce.init({
    selector: '#txtDescripcionOrg',
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

function fntInputFile(){//TRABAJA DE LA MANO CON if(document.querySelector(".btnAddImageApoyo")){ para cragar imagenes
    let inputUploadfile = document.querySelectorAll(".inputUploadfile");
    inputUploadfile.forEach(function(inputUploadfile) {
        inputUploadfile.addEventListener('change', function(){
            let idApoyo = document.querySelector("#idApoyo").value;
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
                    let ajaxUrl = base_url+'/Apoyo_admin/setImage'; 
                    let formData = new FormData();
                    formData.append('idapoyo',idApoyo);
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
    let idApoyo = document.querySelector("#idApoyo").value;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Apoyo_admin/delFile'; 

    let formData = new FormData();//Crear formulario con javascrip
    formData.append('idapoyo',idApoyo);
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

function fntViewInfo(idApoyo){
    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Apoyo_admin/getApoyo/'+idApoyo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                //console.log(objData);
               let htmlImage = "";
               let objApoyo = objData.data;
               let estadoApoyo = objApoyo.status == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#idApoyo").value = objData.idapoyo;
                document.querySelector("#nombre_org").innerHTML = objApoyo.nombre_org;
                document.querySelector("#codigo_org").innerHTML = objApoyo.codigo;
                document.querySelector("#responsable").innerHTML = objApoyo.responsable;
                document.querySelector("#cedula").innerHTML = objApoyo.cedula;
                document.querySelector("#telefono").innerHTML = objApoyo.telefono;
                document.querySelector("#descripcion_org").innerHTML = objApoyo.descripcion_org;
                document.querySelector("#producto").innerHTML = objApoyo.producto;
                document.querySelector("#estado").innerHTML = estadoApoyo;

                if(objApoyo.images.length > 0){
                    let objApoyos = objApoyo.images;
                    for (let p = 0; p < objApoyos.length; p++) {
                        htmlImage +=`<img src="${objApoyos[p].url_image}"></img>`;
                    }
                }
                document.querySelector("#celFotos").innerHTML = htmlImage;
                

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    } 
    $('#modalViewApoyo').modal('show');
}

function fntEditInfo(element,idApoyo){//junto con this en el boton editar del controlador se usa este "eleent" y tambien la siguiente linea
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar apoyo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Apoyo_admin/getApoyo/'+idApoyo;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let htmlImage = "";
                let objApoyo = objData.data;
                
                document.querySelector("#idApoyo").value = objApoyo.idapoyo;
                document.querySelector("#txtNombreOrg").value = objApoyo.nombre_org;
                document.querySelector("#txtCodigoOrg").value = objApoyo.codigo;
                document.querySelector("#txtResponsable").value = objApoyo.responsable;
                document.querySelector("#txtCedula").value = objApoyo.cedula;
                document.querySelector("#txtTelefono").value = objApoyo.telefono;
                //document.querySelector("#txtDescripcionOrg").value = objApoyo.descripcion_org;
                //document.querySelector("#listSorteos").value = objApoyo.productoid;
                //document.querySelector("#listStatus").value = objApoyo.status;
                tinymce.activeEditor.setContent(objApoyo.descripcion_org); 
                $('#listSorteos').selectpicker('render');
                $('#listStatus').selectpicker('render');
                
                if(objApoyo.images.length > 0){
                    let objApoyos = objApoyo.images;
                    for (let p = 0; p < objApoyos.length; p++) {
                        let key = Date.now()+p;
                        htmlImage +=`<div id="div${key}">
                            <div class="prevImage">
                            <img src="${objApoyos[p].url_image}"></img>
                            </div>
                            <button type="button" class="btnDeleteImage" onclick="fntDelItem('#div${key}')" imgname="${objApoyos[p].img}">
                            <i class="fas fa-trash-alt"></i></button></div>`;
                    }
                }
                document.querySelector("#containerImages").innerHTML = htmlImage;
                document.querySelector("#containerGallery").classList.remove("notblock");           
                $('#modalFormApoyo').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(idApoyo){
    swal({//Esta ventana muestra 2 opciones, para confirmar eliminar y/o cancelar
        title: "Eliminar Apoyo",
        text: "¿Realmente quiere eliminar el apoyo?",
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
            let ajaxUrl = base_url+'/Apoyo_admin/delApoyo';
            let strData = "idApoyo="+idApoyo;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableApoyo.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }
    });
}


function fntListaSorteos(){
    if(document.querySelector('#listSorteos')){
        let ajaxUrl = base_url+'/Apoyo_admin/getSelectProductos';
        let request = (window.XMLHttpRequest) ? 
        new XMLHttpRequest() : 
        new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listSorteos').innerHTML = request.responseText;
                $('#listSorteos').selectpicker('render');
            }
        }
    }
}


function openModal(){
    rowTable = "";
    document.querySelector('#idApoyo').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo apoyo";
    document.querySelector("#formApoyo").reset();
    document.querySelector("#containerGallery").classList.add("notblock");
    document.querySelector("#containerImages").innerHTML = "";
    $('#modalFormApoyo').modal('show');
}