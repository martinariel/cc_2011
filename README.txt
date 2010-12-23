1 - Se programa en inglés.
2 - Cada commit es átomico y TIENE que tener descripción.
3 - Un commit que rompe el build es el pecado más grande.
4 - Control de versión. 

		a) 
		Standard GNU:
		Major Version.Minor Version.Release.Build
		
		b)
		Cada versión tiene su respectivo TAG en el SVN.
		
		c)
		En algún lado del código o en los meta datos del ejecutable se indica el respectivo número de versión.
		
5 - Reglas y estilo de programación.

	a) 
	Sintaxis PHP o C++, elegí tu forma y mantenete con ella:
	
	Si haces una vez esto, hacelo siempre.
	
	if ( true ) {
	}
	
	Preferida:
	
	if ( true )
	{
	}

	b) 
	
	No acepto cosas como estas:
	$variable;

	if ( true ) 
		$variable = 2;
	else
		$variable = 3;

	Correccion


	$variable = ( true ) ? SOME_CONSTANT : ANOTHER_CONSTANT;

	c) 
	
	Lo mismo con expresiones booleanas
	
	if ( condition )
		$variable = true;
	else
		$variable = false;

	Correccion

	$variable = ( condition );
	
	d) 
	
	No repetirse, en cada if dentro de una clase pensar "no deberia hacer una clase derivada y hacer un override del metodo"
	
	e)
	
	No repetir código
	
	f)
	
	No hacer búsquedas secuenciales sin avisar en el código que estás ante un colección de datos pequeña y da paja hacer una binaria.
	
	g)
	
	No hacer bubble sorts, si hay que hacer un sort, usa alguna funcion o clase standard que lo haga del tipo quick, heap o merge.
	
	h) 
	
	En C++ no tener "indecision de puntero": 
	
	Mal:
	
	vector<Algo *> * vectorDeAlgo = new vector<Algo* >();
	
	Ok:
	
	vector<Algo*> *vectorDeAlgo = new vector<Algo*>();
	
	Preferida:
	
	vector<Algo*>* vectorDeAlgo = new vector<Algo*>();
	
	i)
	
	En C++ solo los tipos nativos pueden pasar por valor, los demas pasan o por referencia ( constante ) o puntero.
	
	j)
	
	Usar colecciones nativas, C++ => STL , PHP => La mierda que se use ahi ( array seguramente )
	
	k)
	
	Una función => Una idea.
	Una Clase => Una entidad.
	
6) Base de datos y Consultas SQL:

	a) Intentar usar ANSI-SQL en los casos posibles.
	b) Sintaxis de Joins:
	
		Utilizar INNER, LEFT o RIGHT.
	
		NO hacer el join en el WHERE.
	
	c) Cada tabla tiene definida su PK.
	d) Cada campo FK tiene definido un índice.
	e) Criterio de indices para campos no PK y FK: gran cantidad de información y gran cantidad de disperción de datos en el campo.
	
	
	
	

	
		