const termField = document.getElementById('term');
const slugField = document.getElementById('slug');

slugField.value = termField.value.trim().split(" ").join("-");
termField.addEventListener("blur", () => {
    slugField.value = termField.value.trim().split(" ").join("-");
});