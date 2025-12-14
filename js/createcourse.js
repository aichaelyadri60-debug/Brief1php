
document.getElementById("courseForm").addEventListener("submit", function (e) {

    let isValid = true;

    const title = document.getElementById("title");
    const description = document.getElementById("description");
    const level = document.getElementById("level");
    const image = document.getElementById("imagecourses");
    document.querySelectorAll(".error").forEach(el => el.remove());
    if (title.value.trim()=== "") {
        showError(title, "titre et obligatoire .");
        isValid = false;
    }
    if (description.value.trim()==="" ) {
        showError(description, "Description et obligatoire");
        isValid = false;
    }

    if (level.value === "") {
        showError(level, " level et obligatoire .");
        isValid = false;
    }

    if (image.files.length > 0) {
        const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
        if (!allowedTypes.includes(image.files[0].type)) {
            showError(image, "image doit etre png ou jpg ou jpeg.");
            isValid = false;
        }
    }
    if (!isValid) {
        e.preventDefault();
    }
});

function showError(input, message) {
    const error = document.createElement("small");
    error.className = "error";
    error.style.color = "red";
    error.textContent = message;
    input.parentNode.insertBefore(error, input.nextSibling);
}
