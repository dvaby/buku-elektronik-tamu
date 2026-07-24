document.addEventListener("DOMContentLoaded", () => {
    // Fade in saat halaman baru selesai dimuat
    document.body.classList.add("page-fade-in");

    // Cegat semua klik link internal
    document.querySelectorAll("a").forEach((link) => {
        const href = link.getAttribute("href");

        // Skip kalau: link kosong, link ke luar (http lain), link anchor (#), atau buka tab baru
        if (
            !href ||
            href.startsWith("#") ||
            href.startsWith("mailto:") ||
            href.startsWith("tel:") ||
            link.target === "_blank" ||
            link.hostname !== window.location.hostname
        ) {
            return;
        }

        link.addEventListener("click", (e) => {
            e.preventDefault();

            document.body.classList.remove("page-fade-in");
            document.body.classList.add("page-fade-out");

            setTimeout(() => {
                window.location.href = href;
            }, 200); // harus sama dengan durasi transisi di CSS
        });
    });
});

// Reset transisi kalau user pencet tombol "back" browser (biar gak stuck transparan)
window.addEventListener("pageshow", (event) => {
    if (event.persisted) {
        document.body.classList.remove("page-fade-out");
        document.body.classList.add("page-fade-in");
    }
});