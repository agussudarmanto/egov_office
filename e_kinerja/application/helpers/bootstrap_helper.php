<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Gracias por usar mi helper
 * Este helper ayuda a programar un formulario con bootstrap de twitter 3
 * @version 1.0.1
 * @author Nekszer Lopez Espinoza
 * @package Bootstrap
 */


//---------- <load bootstrap>
/**
 * Este método carga los ficheros css y js de bootstrap
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('load_bootstrap')){
	function load_bootstrap()
	{
		$bootstrap = "";
		$bootstrap .= "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>";

		$bootstrap .= "<script src='//code.jquery.com/jquery-1.11.2.min.js'></script>";
		$bootstrap .= "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>";
		$bootstrap .= "<script src='http://markusslima.github.io/bootstrap-filestyle/js/bootstrap-filestyle.min.js'></script>";
		return $bootstrap;
	}
}

//---------- <form>
/**
 * Este método crea un nuevo form con la configuración de bootstrap
 * @since 	1.1.0
 * @version 1.1.0
 * @param 	$action - controllador/method que captara el submit 
 * @return  String -> <form ...>
 */
if(!function_exists('form_open'))
{
	/**
	 * 1.0.1 => 1.1.0  
	 * $atributos = '' => $atributos = null
	 */
    function form_open($action = '', $atributos = null)
    {
    	//obtenemos instancia global del core CodeIgniter
		$CI =& get_instance();
		//obtenemos la base url establecida en la configuración
		$base_url = $CI->config->item('base_url');
		
		//validamos que el usuario haya ingresado datos en el método
		if($action != ''){
			//validamos que la ruta a la cual se envían los datos del formulario, sea valida
			if(strpos($action, '/')){
				//regresamos el código correspondiente html
				$form  = "<form role='form' action='". $base_url . $action ."'";
				$form .= setAtributos($atributos,'form');
				$form .= " accept-charset='utf-8'>";
				return $form;
			}else{
				//regresamos un error en caso de que la action no sea correcta
				return "<br>Error, el parámetro de form_open debe contener la siguiente sintaxis: <br>controller/method --- Error: [" . $action ."]";
			}	 
		}else{
			return "Error falta el parámetro action en el método form_open('controller/method')";
		}
    }   
}

if(!function_exists('form_open_multipart')){
	function form_open_multipart($action = '', $atributos = '')
	{
		//obtenemos instancia global del core CodeIgniter
		$CI =& get_instance();
		//obtenemos la base url establecida en la configuración
		$base_url = $CI->config->item('base_url');
		
		//validamos que el usuario haya ingresado datos en el método
		if($action != ''){
			//validamos que la ruta a la cual se envían los datos del formulario, sea valida
			if(strpos($action, '/')){
				//regresamos el código correspondiente html
				$form  = "<form role='form' action='". $base_url . $action ."' enctype='multipart/form-data'";
				$form .= setAtributos($atributos,'form');
				$form .= " accept-charset='utf-8'>";
				return $form;
			}else{
				//regresamos un error en caso de que la action no sea correcta
				return "<br>Error, el parámetro de form_open debe contener la siguiente sintaxis: <br>controller/method --- Error: [" . $action ."]";
			}	 
		}else{
			return "Error falta el parámetro action en el método form_open('controller/method')";
		}
	}
}

//---------- </form>
/**
 * Este método cierra la etiqueta form de html
 * @since 	1.0.1
 * @version 1.0.1
 * @return  String -> </form>
 */
if(!function_exists('form_close'))
{
    function form_close()
    {
    	//retornamos el cierre de la etiqueta
    	return "</form>";
    }   
}

//---------- <input type=''>
/**
 * Código genérico para generar elementos <input> de los siguientes tipos
 * type = [text, password]
 * @since 	1.0.1
 * @version 1.0.1
 * @return <input>
 */
if(!function_exists('form_input'))
{
    function form_input($type = 'text', $name = '', 
    	$message = '', $atributos = null, $value = '')
    {
    	$div  = "<div class='form-group'>";
    	if($atributos!= null){
    		if(array_key_exists('id', $atributos)){
    			if($message != ''){
    				$div .= "<label for='". $atributos['id'] ."'>". $message ."</label>";
    			}
    			$div .= "<input type='". $type ."' class='form-control' name='". $name ."'";
    		}else{
    			if($message != '')
    			{
    				$div .= "<label for='". $name ."'>". $message ."</label>";
    			}
    			$div .= "<input type='" . $type . "' class='form-control' id='" . $name . "' name='". $name ."'"; 
    		}
    		if(array_key_exists('value', $atributos)){
    			$div .= setAtributos($atributos, "input") . " required=''>";
    		}else{
    			$div .= setAtributos($atributos, "input") . " required='' value='". $value ."'>";
    		}
    	}else{
    		if($message != ''){
    			$div .= "<label for='". $name ."'>". $message ."</label>";
    		}
    		$div .= "<input type='" . $type . "' class='form-control' id='" . $name . "' name='". $name ."' required=''>";
    	}
		return $div .= "</div>";
    }   
}

//---------- <input type='text'>
/**
 * Este método crea un input con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_text'))
{
    function form_input_text($name = '', $message = '', $atributos = null)
    {
    	return form_input("text",$name, $message, $atributos);
    }   
}

//---------- <input type='number'>
/**
 * Este método crea un input con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_number'))
{
    function form_input_number($name = '', $message = '', $atributos = null)
    {
    	if(!array_key_exists('min',$atributos))
    	{
    		$atributos['min'] = '1';
    	}
    	if(!array_key_exists('max',$atributos))
    	{
    		$atributos['max'] = '150';
    	}
    	return form_input("number",$name, $message, $atributos);
    }   
}

//---------- <input type='date'>
/**
 * Este método crea un input con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_date'))
{
    function form_input_date($name = '', $message = '', $atributos = null)
    {
    	return form_input("date",$name, $message, $atributos);
    }   
}

//---------- <input type='datetime'>
/**
 * Este método crea un input con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_time'))
{
    function form_input_time($name = '', $message = '', $atributos = null)
    {
    	return form_input("time",$name, $message, $atributos);
    }   
}

//---------- <input type='email'>
/**
 * Este método crea un input con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_email'))
{
    function form_input_email($name = '', $message = '', $atributos = null)
    {
    	return form_input("email",$name, $message, $atributos);
    }   
}

/**
 * Este método crea un input con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @param $value 		= valor del elemento
 * @since 	1.1.0
 * @version 1.1.0
 */
if(!function_exists('form_input_value'))
{
    function form_input_value($name = '', $message = '', $atributos = null, $value = '')
    {
    	return form_input("text",$name, $message, $atributos, $value);
    }
}

//---------- <input type='password'>
/**
 * Este método crea un input con la clase form-control, el atributo required, el 
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parametro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_password'))
{
    function form_input_password($name = '', $message = '', $atributos = null)
    {
    	return form_input("password",$name, $message, $atributos);
    }   
}

//----- Text area
/**
 * Este método crea un textarea con la clase form-control, el atributo required, el
 * atributo name = $name y los atributos enviados como array asociativo, también crea  
 * un label que tiene el valor del parametro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_textarea')){
	function form_input_textarea($name = '', $message = '', $atributos = null)
	{
		$div  = "<div class='form-group'>";
    	if($atributos!= null){
    		if(array_key_exists('id', $atributos)){
    			$div .= "<label for='". $atributos['id'] ."'>". $message ."</label>";
    			$div .= "<textarea class='form-control' name='". $name ."'";
    		}else{
    			$div .= "<label for='". $name ."'>". $message ."</label>";
    			$div .= "<textarea class='form-control' id='" . $name . "' name='". $name ."'"; 
    		}
    		$div .= setAtributos($atributos, "input") . " required='' rows='3'></textarea>";
    	}else{
    		$div .= "<label for='". $name ."'>". $message ."</label>";
    		$div .= "<textarea class='form-control' id='" . $name . "' name='". $name ."' required='' rows='3'></textarea>";
    	}
		return $div .= "</div>";
	}
}

//----- Radios
/**
 * Este método crea un radiobutton horizontal con la clase form-control
 * y el atributo required, el atributo name = $name y los atributos enviados como 
 * array asociativo, también crea un label que tiene el valor del parametro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 */
if(!function_exists('form_input_radio')){
	function form_input_radio($name = '', $message = '', $valor = '', $atributos = null)
	{
		$div  = "<div class='radio-inline'>";
		$div .= "<label class='radio-inline'>";
		$div .= "<input type='radio' name='". $name ."' value='". $valor ."'";
		if($atributos == null){	
			$div .= " id='". $name ."'";
		}
		$div .= setAtributos($atributos, 'radio') . ">";
		$div .= $message;
		$div .= "</label>";
		return $div .= "</div>";
	}
}

//----- Check
/**
 * Este método crea checkbox horizontal con la clase form-control
 * y el atributo required, el atributo name = $name y los atributos enviados como 
 * array asociativo, también crea un label que tiene el valor del parámetro $message
 * @param $name 		= valor del atributo name
 * @param $message 		= <label>$message</label>
 * @param $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.0.1
 * @version 1.0.1
 * @return  string - <input type='checkbox' ...>  
 */
if(!function_exists('form_input_checkbox')){
	function form_input_checkbox($name = '', $message = '', $atributos = null)
	{
		$div  = "<div class='checkbox-inline'>";
		$div .= "<label class='checkbox-inline'>";
		$div .= "<input type='checkbox' name='". $name ."'"; 
		if($atributos == null){	
			$div .= " id='". $name ."'";
		}
		$div .= setAtributos($atributos, 'checkbox') . ">";
		$div .= $message;
		$div .= "</label>";
		$div .= "</div>";
		return $div;
	}
}

//----- Select
/**
 * Este método genera código estándar para la creación de opciones de un select html
 * es necesario utilizar el método select_options($data = array('value' => 'display'));
 * para que este método funcione correctamente.
 * @param 	$options - [array asociativo]
 * @since 	1.0.1
 * @version 1.0.1
 * @return 	String - <div class...><select ...> 
 */
if(!function_exists('form_input_select')){
	function form_input_select($name = '', $hidden = false)
	{	
		$div = "<div class='form-group'>";
		if(!$hidden){
			$div .= "<select id='". $name ."' name='". $name ."' class='form-control'>";	
		}else{
			$div .= "<select id='". $name ."' name='". $name ."' class='form-control' style='display: none;'>";
		} 
		return $div;
	}
}

//----- input file
/**
 * Este método genera código estándar para la creación de un input file de html
 * @param   $texto - texto que se mostrara en el input example: 'choose a file'
 * @since 	1.2.0
 * @version 1.2.0
 * @return 	String - <div class...><input ...> 
 */
if(!function_exists('form_input_file')){
	function form_input_file($texto = 'Seleccionar archivo')
	{	
		$div  = "<div class='form-group'>";
		$div .= "<input name='userfile' type='file' id='userfile' class='filestyle' data-icon='true' data-buttonText='$texto' required=''>";	
		$div .= "</div>";
		return $div;
	}
}

//----- options
/**
 * Este método genera código estándar para la creación de opciones de un select html
 * es necesario usar antes el método form_input_select
 * @param 	$options - [array asociativo]
 * @since 	1.0.1
 * @version 1.0.1
 * @return 	options con valores
 */
if(!function_exists('select_options')){
	function select_options($options = null)
	{	
		$html = "";
		if($options != null){
			foreach ($options as $value => $option) {
				$html .= "<option value='". $value ."'>". $option ."</option>";
			}
		}
		$html .= "</select></div>";
		return $html;
	}
}

//----- submit
/**
 * Este metodo genera un boton de submit para el formulario que se esta creando
 * @param   $atributos 	= array('placeholder' => 'ingresa texto') 
 * @since 	1.2.0
 * @version 1.0.1
 * @return  button submit bootstrap
 */
if ( ! function_exists('form_submit'))
{
    function form_submit($message = '', $class = '')
    {
    	$class = $class == '' ? 'btn btn-success' : $class;
    	return "<div class='form-group'><input type='submit' class='". $class ."' value='$message'/></div>";
    }   
}

//----- table
/**
 * Este metodo genera una tabla a travez de un $result = $this->db->...('SQL');
 * example echo create_table($result);
 * @param   $matriz = $result 
 * @since 	1.2.1
 * @version 1.2.1
 * @return  codigo html para imprimir la tabla
 */
if(! function_exists('create_table')){
	function create_table($matriz = null)
	{
		if($matriz == null){
			return;
		}
		$content  = "<div class='table-responsive'>";
		$content .= "<table class='table table-hover table-bordered table-condensed'>";
		$content .=	"<thead>";
		$content .=	"<tr>";  
			foreach ($matriz->list_fields() as $field)
			{
				$content .= "<th style='text-align: center;'>" . $field . "</th>";
			}
		$content .=	"</tr>";
		$content .=	"</thead>";
		$content .=	"<tbody>";
			foreach ($matriz->result_array() as $row) {
				$content .= "<tr>";
				foreach ($row as $key => $value) {
					$content .= "<td style='text-align: center;'>" . $value . "</td>";
				}
				$content .= "</tr>";
			}
		$content .=	"</tbody>";
		$content .=	"</table>";
		$content .= "</div>";
		return $content;
	}
}

//----------------------
/**
 * Atributos de array asociativo a String
 * @access private
 * @param  $atributos - [array asociativo]
 * @param  $type 	  - [tipo de elemento]
 * @return string
 */
if ( ! function_exists('setAtributos'))
{
	function setAtributos($atributos = null, $type = '')
	{
		$data = ""; 

		switch ($type) {
			case 'form':
				if($atributos != null){
					foreach ($atributos as $key => $value) {
    					if($key == "method"){
    						if($value != "post" && $value != "get"){
    							$data .= " method='post'";
    						}  
    					}
    					$data .= ' ' . $key."='". $value ."'";
					}
					if(strpos($data, "post") || strpos($data, "get")){
						return $data;		
					}
				}
				return $data . " method='post'";
				break;
			
			default:
				if($atributos != null){
					foreach ($atributos as $key => $value) {
    					$data .= ' ' . $key."='". $value ."'";
					}
				}
				return $data;
				break;
		}
	}
}

/* Fin del fichero bootstrap_helper.php 				*/
/* Location: ./application/helper/bootstrap_helper.php 	*/