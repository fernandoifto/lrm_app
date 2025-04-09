function is_cpf(c) {

  if ((c = c.replace(/[^\d]/g, "")).length != 11)
    return false

  if (c == "00000000000")
    return false;

  var r;
  var s = 0;

  for (i = 1; i <= 9; i++)
    s = s + parseInt(c[i - 1]) * (11 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[9]))
    return false;

  s = 0;

  for (i = 1; i <= 10; i++)
    s = s + parseInt(c[i - 1]) * (12 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[10]))
    return false;

  return true;
}


function fMasc(objeto, mascara) {
  obj = objeto
  masc = mascara
  setTimeout("fMascEx()", 1)
}

function fMascEx() {
  obj.value = masc(obj.value)
}

function mCPF(cpf) {
  cpf = cpf.replace(/\D/g, "")
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
  return cpf
}

cpfCheck = function (el) {
  document.getElementById('cpfResponse').innerHTML = is_cpf(el.value) ? '<span class="label label-success">CPF válido</span>' : '<span class="label label-danger">CPF Inválido</span>';
  if (el.value == '') document.getElementById('cpfResponse').innerHTML = '';
}
//Fim CPF


/* Máscaras Telefone */
function mascaraTel(o, f) {
  v_obj = o
  v_fun = f

  setTimeout("execmascaraTel()", 1)
}

function execmascaraTel() {
  v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
  v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
  v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca "()" em volta dos dois primeiros dígitos
  v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
  return v;
}

// aciona função ao digitar dados no campo
window.onload = function () {
  id('telefone').onkeypress = function () {
    mascaraTel(this, mtel);
  }
}

function id(el) {
  return document.getElementById(el);
}
//Fim mascara telefone*/

function maskCEP() {
  const inputValue = document.querySelector("#cep");
  let zipCode = inputValue.value.replace(/\D/g, ""); // Remove caracteres não numéricos

  if (zipCode.length === 8) {
      zipCode = `${zipCode.substr(0, 5)}-${zipCode.substr(5, 9)}`;
      inputValue.value = zipCode;
      console.log(zipCode);
  }
}

// Chame a função no HTML
document.addEventListener("DOMContentLoaded", function () {
  const cepInput = document.querySelector("#cep");

  cepInput.addEventListener("keyup", maskCEP);
});
//fim cep

function maskCNS() {
  const inputValue = document.querySelector("#cartaoSus");
  let cnsCode = inputValue.value.replace(/\D/g, ""); // Remove caracteres não numéricos

  if (cnsCode.length === 15) {
      cnsCode = `${cnsCode.substr(0, 11)} ${cnsCode.substr(11, 4)} ${cnsCode.substr(15, 1)}`;
      inputValue.value = cnsCode;
      console.log(cnsCode);
  }
}

// Chame a função no HTML
document.addEventListener("DOMContentLoaded", function () {
  const cnsInput = document.querySelector("#cartaoSus");

  cnsInput.addEventListener("keyup", maskCNS);
});
