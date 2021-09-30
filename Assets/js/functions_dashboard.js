$('.date-picker').datepicker({
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['1 -', '2 -', '3 -', '4 -', '5 -', '6 -', '7 -', '8 -', '9 -', '10 -', '11 -', '12 -'],
    monthNamesShort: ['Enero','Febrero','Marzo','Abril', 'Mayo','Junio','Julio','Agosto','Septiembre', 'Octubre','Noviembre','Diciembre'],
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    showDays: false,
    onClose: function(dateText, inst) {
        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
});



function fntSearchPagos(){
    let fecha = document.querySelector(".pagoMes").value;
    if(fecha == ""){
        swal("", "Selecccione mes y año", "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
        new XMLHttpRequest() : 
        new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/tipoPagoMes';
        divLoading.style.display = "flex";
        let formData = new FormData();//Crear un formulario del lado javascript
        formData.append('fecha',fecha)
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                //console.log(request.responseText);
                $('#pagosMesAnio').html(request.responseText);
                divLoading.style.display = "none";
                return false;
               /* let objData = JSON.parse(request.responseText);
                if(objData.status){
                    */
                }else{
                    //swal("Error", objData.msg , "error");
                }
            }
        }
    }

    function fntSearchVMes(){
    let fecha = document.querySelector(".ventasMes").value;
    if(fecha == ""){
        swal("", "Selecccione mes y año", "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
        new XMLHttpRequest() : 
        new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/ventasMes';
        divLoading.style.display = "flex";
        let formData = new FormData();//Crear un formulario del lado javascript
        formData.append('fecha',fecha)
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                //console.log(request.responseText);
                $('#graficaMes').html(request.responseText);
                divLoading.style.display = "none";
                return false;
               /* let objData = JSON.parse(request.responseText);
                if(objData.status){
                    */
                }else{
                    //swal("Error", objData.msg , "error");
                }
            }
        }
    }

    function fntSearchVAnio(){
    let anio = document.querySelector(".ventasAnio").value;
    if(anio == ""){
        swal("", "Ingrese el año", "error");
        return false;
    }else{
        let request = (window.XMLHttpRequest) ? 
        new XMLHttpRequest() : 
        new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Dashboard/ventasAnio';
        divLoading.style.display = "flex";
        let formData = new FormData();//Crear un formulario del lado javascript
        formData.append('anio',anio)
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
            if(request.readyState != 4) return;
            if(request.status == 200){
                //console.log(request.responseText);
                $('#graficaAnio').html(request.responseText);
                divLoading.style.display = "none";
                return false;
               /* let objData = JSON.parse(request.responseText);
                if(objData.status){
                    */
                }else{
                    //swal("Error", objData.msg , "error");
                }
            }
        }
    }
