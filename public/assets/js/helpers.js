/*
 * JavaScript Helper Functionalities
 * Author: Raviraj Chougale
 * Web: https://ravirajchougale.com
 */

const IsNumeric = (e) => {
  let keyCode = e.which ? e.which : e.keyCode;
  return (keyCode >= 48 && keyCode <= 57) || keyCode == 8;
};

const IsAlphabet = (e) => {
  let keyCode = e.which ? e.which : e.keyCode;
  if (
    (keyCode > 64 && keyCode < 91) ||
    (keyCode > 96 && keyCode < 123) ||
    keyCode == 8 ||
    keyCode == 32
  )
    return true;
  else return false;
};

const IsAllowedEmailCharacter = (e) => {
  let keyCode = e.which ? e.which : e.keyCode;
  if (
    (keyCode >= 64 && keyCode < 91) ||
    (keyCode >= 48 && keyCode <= 57) ||
    (keyCode > 96 && keyCode < 123) ||
    keyCode == 8 ||
    keyCode == 95 ||
    keyCode == 45 ||
    keyCode == 46 ||
    keyCode == 32
  )
    return true;
  else return false;
};

const IsValidEmail = (email) => {
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  return mailformat.test(email) ? true : false;
};

const removeAllChildNodes = (parent) => {
  while (parent.firstChild) {
    parent.removeChild(parent.firstChild);
  }
};

const disableFields = (fields = [], status = false) => {
  fields.forEach((field) => {
    if (status) {
      field.setAttribute("disabled", "");
    } else {
      field.removeAttribute("disabled");
    }
  });
};
