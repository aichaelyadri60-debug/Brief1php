
document.getElementById("sectionForm").addEventListener("submit", function (e) {

    let valid = true;

    const title = document.querySelector('input[name="title"]');
    const content = document.querySelector('textarea[name="Content"]');

    document.querySelectorAll(".error").forEach(el => el.remove());

    if (title.value.trim() ==="") {
        showError(title, "titre et obligatoire .");
        valid = false;
    }

    if (content.value.trim() ==="") {
        showError(content, "Content et obligatoire .");
        valid = false;
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
