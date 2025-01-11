document.querySelector('.refus').addEventListener("click", function (event) {
    if (!confirm("Êtes-vous sûr que ce client a refusé ?")) {
        event.preventDefault();
    }
});

function showform() {
    document.querySelectorAll('.showform').forEach((element) => {
        element.style.display = 'block';
        document.querySelectorAll('.hiddenform').forEach((e)=>{
            e.style.display = 'none'
        })
    });
}
function hiddenform() {
    document.querySelectorAll('.hiddenform').forEach((element) => {
        element.style.display = 'block';
        document.querySelectorAll('.showform').forEach((e)=>{
            e.style.display = 'none'
        })
    });
}