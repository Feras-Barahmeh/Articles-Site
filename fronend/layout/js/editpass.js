window.onload = function getUrl() {
    const url = new URLSearchParams(window.location.search);
    if (url.has("saveduser")) {
        const form = document.getElementById("confirem-pass");
        form.classList.add("hidden");
    }
}