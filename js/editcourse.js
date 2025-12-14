
document.getElementById("editCourseForm").addEventListener("submit", function (e) {

    let valid = true;

    const titre = document.getElementById("titre");
    const desc = document.getElementById("desc");
    const niveau = document.getElementById("niveau");
    const image = document.getElementById("image");


    document.querySelectorAll(".error").forEach(el => el.remove());

    if (titre.value.trim() ==="") {
        showError(titre, "Titre et obligatoire .");
        valid = false;
    }

    if (desc.value.trim() ==="") {
        showError(desc, "Description et obligatoire");
        valid = false;
    }

    if (!niveau.value) {
        showError(niveau, "selection dun niveau et obligatoire .");
        valid = false;
    }

    if (image.files.length > 0) {
        const allowed = ["image/jpeg", "image/png", "image/jpg"];
        if (!allowed.includes(image.files[0].type)) {
            showError(image, "image doit etre png ou jpg ou jpeg.");
            valid = false;
        }
    }

    if (!valid) {
        e.preventDefault();
    }
});

function showError(input, message) {
    const small = document.createElement("small");
    small.className = "error";
    small.style.color = "red";
    small.textContent = message;
    input.parentNode.insertBefore(small, input.nextSibling);
}
