var click = 0;
function show () {
    var el = document.getElementById('show');
    click++;
    switch (click) {
        case 1:
            el.style.display = 'block';
            break;
        case 2:
            el.style.display = 'none';
            click = 0;
            break;
    }
}