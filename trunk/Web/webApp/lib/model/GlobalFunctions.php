<?php 
/**
 * 
 * Clase de funciones utilitarias globales
 * 
 * @author Martin
 *
 */
class GlobalFunctions
{
    const defaultImgResize      = 50;
    const imgResizeQuality      = 100;
    const nombreFotoPrincipal   = 'foto_principal';
    const dirSeparator          = '/'; 
    
	/**
	 * Parsea un string en un datetime
	 * @param string $fecha
	 * @return DateTime
	 */
	public static function parsearFecha ( $fecha )
	{
		$fecha = ltrim(rtrim ( $fecha ));
		$fecha = ltrim(rtrim ( $fecha , ".") , ".");
		
		$fecha = str_replace ( ". " , "/" , $fecha );
		$fecha = str_replace ( "(" , "" , $fecha );
		$fecha = str_replace ( ")" , "" , $fecha );
		$fecha = str_replace ( "-" , "/", $fecha );
		$fecha = str_replace ( "." , "/", $fecha );
		$fecha = str_replace ( "–" , "/", $fecha );
		
		$fecha = trim ( $fecha );
		$fecha = str_replace ( " " , "/", $fecha );
	
		$valores = explode( "/" , $fecha );
		
		if ( count ($valores) < 3 )
		{
			return null;
		}
		else
		{
		
			$dt = new DateTime();
			
			$day   = (int)$valores[0];
			$month = (int)$valores[1];
			$year  = (int)$valores[2];
			
			if ( $month > 12 && $day <= 12)
			{
				$aux = $month;
				$month = $day;
				$day = $aux;
			}
					
			if ( $year < 100 )
			{
				$year += ( $year <= date("Y") - 2000  )? 2000 : 1900;
			}
	
			$dt->setDate($year, $month, $day);
			
			return $dt;
		}
	}
	
	public static function quitarCaracteresNoNumericos ( $cadena )
	{
		$returnValue = "";
		$longitud    = strlen($cadena);
		
		for ( $i = 0 ; $i < $longitud ; $i++)
		{
			if ( is_numeric($cadena[$i]))
				$returnValue .= $cadena[$i];
		}
		return $returnValue;
	}
    
    /**
     * makeFotoPrincipal
     * 
     * @param Media $media 
     * @return void
     * @author Eric
     */
    public static function makeFotoPrincipal( $media )
    {
        $image  = false;
        
        // obtener img handler
        $img    = self::redimensionarImagen( $media->getArchivo() );
        
        // crear y guardar imagen
        $info           = pathInfo( $media->getArchivo() );
        $ext            = strtoupper( $info['extension'] );
        $destination    = $info['dirname'] . self::dirSeparator . self::nombreFotoPrincipal . '.' . $ext; 
        
        switch ( $ext )
        {
            case 'JPG'  :
            case 'JPEG' :
                $image  = @imagejpeg( $img , $destination , self::imgResizeQuality );
            break;
            
            case 'GIF'  :
                $image  = @imagegif( $img , $destination, self::imgResizeQuality ); 
            break;
    
            case 'PNG'  :
                $image  = @imagepng( $img , $destination, self::imgResizeQuality );
            break;
            
            default:
            break;
        }
        
        // incorporar a la base
        if ( $image )
        {
            $fotoPrincipal  = new Media();
            $fotoPrincipal->setArchivo( $destination );
            $fotoPrincipal->setOrden( -1 );
            $fotoPrincipal->setTipo( $ext );
            $persona        = PersonaPeer::retrieveByPK( $media->getPersonaId() );
            $fotoPrincipal->setPersona( $persona );
            $fotoPrincipal->save();
        }
    }
    
    
    
    /**
     * redimensionarImagen
     * 
     * @param string $imgPath path a la imagen
     * @param int $resize porcentaje a redimensionar
     * @return resource $newImage resource de imagen
     * @author Eric
     */
    public static function redimensionarImagen ( $imgPath , $resize = false )
    {
        if ( $resize == false ) $resize = self::defaultImgResize;
        
        // obtenemos image handler
        $image = self::getImageResource( $imgPath );
        if ( $image == false ) return false;
        
        // dimensiones imagen original
        list( $oldWidth, $oldHeight ) = getimagesize( $imgPath );
        if ( $oldWidth == false || $oldHeight == false ) return false;
        
        // nuevas dimensiones
        list( $newWidth, $newHeight ) = array( ( $oldWidth * $resize ) / 100 , ( $oldHeight * $resize ) / 100 );
        
        // nuevo recurso de imagen
        $newImage = imagecreatetruecolor( $newWidth, $newHeight );
        imagecopyresampled( $newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight );
        
        return $newImage;
    }
    
    /**
     * getImageResource
     *
     * @param string $path path a la imagen
     * @return resource $image image handler
     * @author Eric
     */
    public static function getImageResource( $path )
    {
        $image = false;
        
        if ( !is_string( $path ) ) return false;
        
        $ext = strtoupper( pathinfo( $path , PATHINFO_EXTENSION ) );

        switch ( $ext )
        {
            case 'JPG'  :
            case 'JPEG' :
                $image  = @imagecreatefromjpeg( $path );
            break;
            
            case 'GIF'  :
                $image  = @imagecreatefromgif( $path ); 
            break;
    
            case 'PNG'  :
                $image  = @imagecreatefrompng( $path );
            break;
            
            default:
            break;
        }
        
        return $image;
    }
}

?>
