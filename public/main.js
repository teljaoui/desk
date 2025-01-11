document.querySelector('.refus').addEventListener("click", function (event) {
    if (!confirm("Êtes-vous sûr que ce client a refusé ?")) {
        event.preventDefault();
    }
});