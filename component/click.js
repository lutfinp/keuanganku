var buttons = document.getElementsByClassName("myButton");

// Tambahkan event listener untuk setiap tombol
for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function() {
    // Hapus kelas "active" dari semua tombol
    for (var j = 0; j < buttons.length; j++) {
      buttons[j].classList.remove("active");
    }
    // Tambahkan kelas "active" pada tombol yang diklik
    this.classList.add("active");
  });
}