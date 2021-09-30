
function controlTag(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    else if (tecla==0||tecla==9)  return true;
    patron =/[0-9\s]/;
    n = String.fromCharCode(tecla);
    return patron.test(n); 
}

function testText(txtString){
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
    if(stringText.test(txtString)){
        return true;
    }else{
        return false;
    }
}

function testEntero(intCant){
    var intCantidad = new RegExp(/^([0-9])*$/);
    if(intCantidad.test(intCant)){
        return true;
    }else{
        return false;
    }
}

function fntEmailValidate(email){
    //var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/); con el signo mas admite mas caracteres en el.com, y sin el mas solo entre 2 y 4
    var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})$/);
    if (stringEmail.test(email) == false){
        return false;
    }else{
        return true;
    }
}

function fntValidText(){
    let validText = document.querySelectorAll(".validText");
    validText.forEach(function(validText) {
        validText.addEventListener('keyup', function(){
            let inputValue = this.value;
            if(!testText(inputValue)){
                this.classList.add('is-invalid');
            }else{
                this.classList.remove('is-invalid');
            }               
        });
    });
}

function fntValidNumber(){
    let validNumber = document.querySelectorAll(".validNumber");
    validNumber.forEach(function(validNumber) {
        validNumber.addEventListener('keyup', function(){
            let inputValue = this.value;
            if(!testEntero(inputValue)){
                this.classList.add('is-invalid');
            }else{
                this.classList.remove('is-invalid');
            }               
        });
    });
}

function fntValidEmail(){
    let validEmail = document.querySelectorAll(".validEmail");
    validEmail.forEach(function(validEmail) {
        validEmail.addEventListener('keyup', function(){
            let inputValue = this.value;
            if(!fntEmailValidate(inputValue)){
                this.classList.add('is-invalid');
            }else{
                this.classList.remove('is-invalid');
            }               
        });
    });
}

// --------INICIO CODIGOS PARA DOLARTODAY-------
/*function number_format(amount, decimals) {// --------Coloca los puntos de mil y millar y decimal-------

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');

    return amount_parts.join(',');
}
//DOLARTODAY
//https://s3.amazonaws.com/dolartoday/data.json
$.getJSON("https://s3.amazonaws.com/dolartoday/data.json",function(data){
    data.USD.transferencia=number_format(data.USD.transferencia,2);
    $('#texto').html('DolarToday: '+data.USD.transferencia+' (');
    $('#al').html(data._timestamp.fecha+')');
});*/ 
// --------FIN CODIGOS PARA DOLARTODAY-------

window.addEventListener('load', function() {
    fntValidText();
    fntValidEmail(); 
    fntValidNumber();
}, false);