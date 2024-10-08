  /* *** This funciton is Number validation perpous *** */ 
  function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
 }    

 function isphone(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
 }    


 /* *** This funciton is Name validation perpous *** */ 
function isTextKey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && charCode!=32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
        return false;

     return true;
  }
  /* *** This funciton is address validation perpous *** */ 
  function addresskey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     //alert(charCode);
     if (charCode > 31 && charCode!=32 && charCode!=46 && charCode!=47 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }

  /* *** This funciton is email address validation perpous *** */ 
  function emailkey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     //alert(charCode);
     if (charCode > 31 && charCode!=64 && charCode!=46 && charCode!=47 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }

   function loginkey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     //alert(charCode);
     if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 64 || charCode > 126) && (charCode < 35 || charCode > 38) && (charCode < 45 || charCode > 46))
        return false;

     return true;
  }

