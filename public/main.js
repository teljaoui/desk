document.querySelector('.refus').addEventListener("click", function (event) {
    if (!confirm("Êtes-vous sûr que ce client a refusé ?")) {
        event.preventDefault();
    }
});

document.querySelector('.validé').addEventListener("click", function (event) {
    if (!confirm("Êtes-vous sûr que ce client a Validé ?")) {
        event.preventDefault();
    }
});

function showform() {
    document.querySelectorAll('.showform').forEach((element) => {
        element.style.display = 'block';
        document.querySelectorAll('.hiddenform').forEach((e) => {
            e.style.display = 'none'
        })
    });
}


function hiddenform() {
    document.querySelectorAll('.hiddenform').forEach((element) => {
        element.style.display = 'block';
        document.querySelectorAll('.showform').forEach((e) => {
            e.style.display = 'none'
        })
    });
}


function showformR() {
    document.querySelectorAll('.showformR').forEach((element) => {
        element.style.display = 'block';
        document.querySelectorAll('.hiddenformR').forEach((e) => {
            e.style.display = 'none'
        })
    });
}
function hiddenformR() {
    document.querySelectorAll('.hiddenformR').forEach((element) => {
        element.style.display = 'block';
        document.querySelectorAll('.showformR').forEach((e) => {
            e.style.display = 'none'
        })
    });
}