const modal = document.getElementById("myModal");
const seeMore = document.getElementById("see-more");

function openModal() {
  modal.style.display = "block";
}

function closeModal() {
  modal.style.display = "none";
}

function showMore() {
  seeMore.style.display = "block";
  document.querySelector("#myModal button").style.display = "none";
}
