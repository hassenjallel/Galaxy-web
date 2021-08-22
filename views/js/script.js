function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
function verifNumCarte(champ)
{
   if(champ.value.length < 14 || champ.value.length > 16 || isNaN(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }

  
}
function verifCvc(champ)
{
  if(champ.value.length < 3 || champ.value.length > 4 || isNaN(champ.value))
   {
    surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function verifNom(champ)
{
  if (/[^a-zA-Z]/.test(champ.value) || champ.value.length < 3 )
  {
    surligne(champ, true);
      return false;
  }
  else
   {
      surligne(champ, false);
      return true;
   }
}
