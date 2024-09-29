<script src="{{ asset('') }}/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}/assets/js/sidebarmenu.js"></script>
<script src="{{ asset('') }}/assets/js/app.min.js"></script>
<script src="{{ asset('') }}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{ asset('') }}/assets/libs/simplebar/dist/simplebar.js"></script>
<script src="{{ asset('') }}/assets/js/dashboard.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const links = document.querySelectorAll('.sidebar-link');

  // Event listener untuk setiap link di sidebar
  links.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault(); // Mencegah reload halaman
      const url = this.getAttribute('href'); // Mendapatkan URL dari href

      // Ganti URL tanpa reload halaman
      window.history.pushState({ path: url }, '', url);

      // Muat konten baru berdasarkan URL
      loadPageContent(url);
    });
  });

  // Fungsi untuk memuat konten halaman secara dinamis
  function loadPageContent(url) {
    console.log('Memuat konten untuk URL:', url); // Debugging: cek URL yang dimuat

    // Gunakan fetch atau AJAX untuk mengambil konten halaman
    fetch(url)
      .then(response => {
        console.log('Status Response:', response.status); // Debugging: cek status response
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
      })
      .then(html => {
        console.log('Konten halaman berhasil diambil'); // Debugging: cek apakah konten diambil
        // Pastikan elemen ini ada dalam HTML
        const contentArea = document.querySelector('#main-content');
        if (contentArea) {
          contentArea.innerHTML = html;
        } else {
          console.error('Elemen target untuk konten (#main-content) tidak ditemukan.');
        }
      })
      .catch(err => {
        console.error('Gagal memuat konten halaman:', err);
      });
  }

  // Event untuk menangani navigasi dengan tombol back/forward
  window.addEventListener('popstate', function (event) {
    const url = window.location.pathname;
    loadPageContent(url); // Muat konten berdasarkan perubahan URL
  });
});


    </script>
