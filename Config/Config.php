<?php 
	
	const BASE_URL = "http://localhost/turifa";
	//const BASE_URL = "https://turifa.net";

	//Zona horaria
	date_default_timezone_set('America/Caracas');

	//Conexión
	const DB_HOST = "localhost";
	const DB_NAME = "db_turifa";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Para envío de correo
	const ENVIRONMENT = 0; // Local: 0, Producción: 1;
	//const ENVIRONMENT = 1; // Local: 0, Producción: 1;

	//Delimitadores de millares y decimales
	const SPD = ",";
	const SPM = ".";

	//Simbolo de la moneda
	const SMONEY = "USD ";
	const CURRENCY = "USD";
	const NOM = "turifa.net";
	const FAVICON = "http://localhost/turifa/Assets/tienda/images/icons/favicon.png";
	const LOGO = "http://localhost/turifa/Assets/tienda/images/icons/logo.jpg";
	const LOGOADMIN = "http://localhost/turifa/Assets/tienda/images/icons/logo_admin.png";

	//API PAYPAL
	//SANDBOX PAYPAL
	const URLPAYPAL = "https://api-m.sandbox.paypal.com";
	const IDCLIENTE = "ATBlns-CdjxlKU7MF7Fv6ZntqbmPCwzMAsK_eCgJ8tqT7g9AWTKg-2Pv_2MDryxaF6qXjiFuYWCH69Xe";
	const SECRET = "ELGWQ9TliyQQeUa-NnWHCY1aAgttE7mpTqeirXkS3N1G93Igo1uTNIRrMydKLrdCdlfCp3hkCS2asnVa";
	//LIVE PAYPAL
	//const URLPAYPAL = "https://api-m.paypal.com";
	//const IDCLIENTE = "";
	//const SECRET = "";

	//Datos de envio de correo electrónico
	const NOMBRE_REMITENTE = "turifa.net";
	const EMAIL_REMITENTE = "turifa.net@gmail.com";
	const NOMBRE_EMPRESA = "turifa.net";
	const WEB_EMPRESA = "www.turifa.net";
	const FRASE = "Vive una bonita experiencia apoyando a quien más lo necesita.";

	//Compartir en las redes
	const DESCRIPCION = "Es la oportunidad de tu vida!";
	const SHAREDHASH = "CambiandoVidas";//Sin espacios

	//Datos Empresa
	const DIRECCION = "San Miguel, calle principal, Ejido-Venezuela";
	const TELEMPRESA = "+(58) 0426-5707677";
	const WHATSAPP = "+584265707677";
	const EMAIL_EMPRESA = "nesen69@gmail.com";
	const EMAIL_PEDIDOS = "nesen69@gmail.com";
	const EMAIL_CONTACTO = "nesen69@gmail.com";

	const CAT_SLIDER = "1,2,3";
	const CAT_BANNER = "4,5,6";
	const CAT_FOOTER = "1,2,3,4,5,6";

	const KEY = 'abelosh';
	const METHODENCRIPT = "AES-128-ECB";

	//Modulos
	const MDASHBOARD = 1;
	const MUSUARIOS = 2;
	const MCLIENTES = 3;
	const MPRODUCTOS = 4;
	const MPEDIDOS = 5;
	const MCATEGORIAS = 6;
	const MROLES = 7;
	const MREPORTES = 8;
	const MAPOYO = 9;
	const MGANADOR = 10;
	const MFUNDACIONES = 11;
	const MREPORTESC = 12;
	const MDCONTACTO = 13;
	

	//Roles
	const RADMINISTRADOR = 1;
	const RGERENTE = 2;
	const RCLIENTES = 3;

	const STATUS = array('Pagado','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	/*CANTIDAD de Productos por pagina*/
	const CANTPRODHOME = 8;//En el home
	const PRODPORPAGINA = 8;//En la tienda
	const PROCATEGORIA = 4;
	const PROBUSCAR = 4;

		/*REDES SOCIALES*/
	const FACEBOOK = "https://www.facebook.com/";
	const INSTAGRAM = "https://www.instagram.com/nestorramirez963/?hl=es-la";

 ?>