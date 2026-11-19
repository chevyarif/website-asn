const navItems = [
  ["Home","index.html"],["Tentang Kami","tentang-kami.html"],
  ["Produk & Layanan","produk-layanan.html"],["Gallery","gallery.html"],["Kontak","kontak.html"]
];
const currentPage = location.pathname.split("/").pop() || "index.html";
const navLink = ([label,href]) => `<a class="site-link ${currentPage===href?'active':''}" href="${href}">${label}</a>`;
document.getElementById("header").innerHTML = `
<header class="sticky top-0 z-50 border-b border-slate-100 bg-white/95 backdrop-blur">
 <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
  <a href="index.html" class="flex items-center gap-3"><span class="flex h-11 w-11 items-center justify-center rounded-xl bg-navy text-lg font-extrabold text-white">CP</span><span><b class="block text-lg font-extrabold tracking-tight text-navy">NAMA PERUSAHAAN</b><small class="text-xs font-semibold tracking-wider text-slate-500">COMPANY PROFILE</small></span></a>
  <nav class="hidden items-center gap-8 md:flex">${navItems.map(navLink).join("")}</nav>
  <button id="menuButton" class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-bold text-navy md:hidden" aria-label="Buka menu">☰</button>
 </div>
 <nav id="mobileMenu" class="mobile-menu flex-col gap-4 border-t border-slate-100 bg-white px-6 py-5 md:hidden">${navItems.map(([label,href])=>`<a class="font-semibold ${currentPage===href?'text-brand':'text-slate-600'}" href="${href}">${label}</a>`).join("")}</nav>
</header>`;
document.getElementById("footer").innerHTML = `
<footer class="bg-[#071D3B] text-blue-100"><div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-3">
 <div><b class="text-xl font-extrabold text-white">NAMA PERUSAHAAN</b><p class="mt-4 max-w-sm text-sm leading-7 text-blue-200">Mitra terpercaya untuk menghadirkan produk dan layanan berkualitas dengan profesionalisme dan inovasi.</p></div>
 <div><b class="text-white">Navigasi</b><div class="mt-4 grid grid-cols-2 gap-3">${navItems.map(([label,href])=>`<a class="text-sm text-blue-200 hover:text-white" href="${href}">${label}</a>`).join("")}</div></div>
 <div><b class="text-white">Hubungi Kami</b><p class="mt-4 text-sm leading-7 text-blue-200">info@namaperusahaan.co.id<br>+62 812-3456-7890<br>Indonesia</p></div>
 </div><div class="border-t border-white/10 py-5 text-center text-xs text-blue-300">© ${new Date().getFullYear()} Nama Perusahaan. Hak Cipta Dilindungi.</div></footer>`;
document.getElementById("menuButton").addEventListener("click",()=>document.getElementById("mobileMenu").classList.toggle("open"));