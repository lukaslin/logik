function showAssign () {
    if (document.getElementById('statement').style.display == 'none') {
        document.getElementById('statement').style.display = 'inline-block';
        document.getElementById('show').innerHTML='schovej';
    }
    else {
        document.getElementById('statement').style.display = 'none';
        document.getElementById('show').innerHTML='ukaž';
    }
}

function showForm (form) {
    document.getElementById('select'+form).style.display = 'inline-block';

}

function hideForm (form) {
    document.getElementById('select'+form).style.display = 'none';
}

function setColor (form, color) {
    document.getElementById('select'+form).style.display = 'none';
    document.getElementById('input'+form).value = color;
    document.getElementById('assign'+form).style.backgroundColor = color;

}