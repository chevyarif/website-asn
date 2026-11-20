async function loadSharedComponents() {
  const [headerResponse, footerResponse] = await Promise.all([
    fetch("components/header.html"),
    fetch("components/footer.html")
  ]);
  if (!headerResponse.ok || !footerResponse.ok) throw new Error("File komponen header/footer tidak dapat dimuat.");

  document.getElementById("header").innerHTML = await headerResponse.text();
  document.getElementById("footer").innerHTML = await footerResponse.text();

  const currentPage = location.pathname.split("/").pop() || "index.html";
  document.querySelectorAll("[data-page]").forEach(link => {
    if (link.dataset.page === currentPage) {
      link.classList.add("active", "text-brand");
      link.setAttribute("aria-current", "page");
    }
  });
  const year = document.getElementById("currentYear");
  if (year) year.textContent = new Date().getFullYear();
  const menuButton = document.getElementById("menuButton");
  const mobileMenu = document.getElementById("mobileMenu");
  if (menuButton && mobileMenu) menuButton.addEventListener("click", () => mobileMenu.classList.toggle("open"));
}
loadSharedComponents().catch(error => {
  console.error(error);
  document.getElementById("header").innerHTML = '<p class="p-4 text-center text-red-600">Header gagal dimuat. Jalankan website melalui local server.</p>';
});
