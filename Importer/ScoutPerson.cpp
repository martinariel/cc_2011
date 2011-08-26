//---------------------------------------------------------------------------


#pragma hdrstop

#include "ScoutPerson.h"

//---------------------------------------------------------------------------

ScoutPerson::ScoutPerson ( void )
{
	age = code = weight = height = -1;
	date = name = place = observations = borndate = telephone = celphone = email = activities = "";
	nacionality = languages = "";
	hair = size = skin = eyes = agency = "";
}

#pragma package(smart_init)
