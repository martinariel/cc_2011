//---------------------------------------------------------------------------

#ifndef ScoutPersonH
#define ScoutPersonH
#include <vcl.h>

class ScoutPerson
{
public:

	int code, age, weight, height;
	AnsiString date,name,place,observations,telephone,celphone,borndate,email;
	AnsiString activities,nacionality, languages;

	ScoutPerson ( void );
};
//---------------------------------------------------------------------------
#endif
