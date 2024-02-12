// var keyword = document.getElementById("keyword");
// var tombolCari = document.getElementById("tombol-cari");
// var container = document.getElementById("container");

// // event ketika keyword ditulis
// keyword.addEventListener("keyup", function () {
//   // buat object ajax
//   var xhr = new XMLHttpRequest();

//   // cek kesiapan ajax
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       container.innerHTML = xhr.responseText;
//     }
//   };

//   // eksekusi ajax
//   xhr.open("GET", "mahasiswa.php?keyword=" + keyword.value, true);
//   xhr.send();
// });

// Use Jquery
$(document).ready(function () {
  //hilangkan tombol cari
  $("#tombol-cari").hide();

  $("#keyword").on("keyup", function () {
    $("#container").load("mahasiswa.php?keyword=" + $("keyword").val());
  });
});
