//---------------------------------------------------------------------------

#ifndef CastPersonH
#define CastPersonH
#include <vcl.h>

class CastPerson
{
public:
	AnsiString name, agency, telephone,celphone,document,observations, shirtSize, date;
	AnsiString birthday, pantsSize;
	AnsiString sizes;
	int weight, height, shoeSize;
	int code, age;

	CastPerson ( void );
};
//---------------------------------------------------------------------------
#endif
