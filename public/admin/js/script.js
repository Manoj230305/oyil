const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

// Sidebar toggle işlemi
menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

// Sayfa yüklendiğinde ve boyut değişimlerinde sidebar durumunu ayarlama
function adjustSidebar() {
  if (window.innerWidth <= 576) {
    sidebar.classList.add("hide"); // 576px ve altı için sidebar gizli
    sidebar.classList.remove("show");
  } else {
    sidebar.classList.remove("hide"); // 576px'den büyükse sidebar görünür
    sidebar.classList.add("show");
  }
}

// Sayfa yüklendiğinde ve pencere boyutu değiştiğinde sidebar durumunu ayarlama
window.addEventListener("load", adjustSidebar);
window.addEventListener("resize", adjustSidebar);

// Arama butonunu toggle etme
const searchButton = document.getElementById("searchInput");

const searchButtonIcon = document.querySelector(
  "#content nav form .form-input button .bx"
);
const searchForm = document.querySelector("#content nav form");

searchButton.addEventListener("click", function (e) {
  if (window.innerWidth < 768) {
    e.preventDefault();
    searchForm.classList.toggle("show");
    if (searchForm.classList.contains("show")) {
      searchButtonIcon.classList.replace("bx-search", "bx-x");
    } else {
      searchButtonIcon.classList.replace("bx-x", "bx-search");
    }
  }
});

// Dark Mode Switch
const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

// Notification Menu Toggle
document.querySelector(".notification").addEventListener("click", function () {
  document.querySelector(".notification-menu").classList.toggle("show");
  document.querySelector(".profile-menu").classList.remove("show"); // Close profile menu if open
});

// Profile Menu Toggle
document.querySelector(".profile").addEventListener("click", function () {
  document.querySelector(".profile-menu").classList.toggle("show");
  document.querySelector(".notification-menu").classList.remove("show"); // Close notification menu if open
});

// Close menus if clicked outside
window.addEventListener("click", function (e) {
  if (!e.target.closest(".notification") && !e.target.closest(".profile")) {
    document.querySelector(".notification-menu").classList.remove("show");
    document.querySelector(".profile-menu").classList.remove("show");
  }
});

// Menülerin açılıp kapanması için fonksiyon
function toggleMenu(menuId) {
  var menu = document.getElementById(menuId);
  var allMenus = document.querySelectorAll(".menu");

  // Diğer tüm menüleri kapat
  allMenus.forEach(function (m) {
    if (m !== menu) {
      m.style.display = "none";
    }
  });

  // Tıklanan menü varsa aç, yoksa kapat
  if (menu.style.display === "none" || menu.style.display === "") {
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
}

// Başlangıçta tüm menüleri kapalı tut
document.addEventListener("DOMContentLoaded", function () {
  var allMenus = document.querySelectorAll(".menu");
  allMenus.forEach(function (menu) {
    menu.style.display = "none";
  });
});

const categoryList = document.getElementById("category-list");
const editCategoryModal = document.getElementById("editCategoryModal");
const closeModalBtn = document.querySelector(".close");

// Fetch Categories via AJAX
function fetchCategories() {
  fetch("get_categories.php") // Assume this PHP file returns JSON data
    .then((response) => response.json())
    .then((categories) => {
      categoryList.innerHTML = "";
      categories.forEach((category) => {
        const li = document.createElement("li");
        li.classList.add("not-completed");
        li.dataset.id = category.id;
        li.innerHTML = `<p>${category.destination_name}</p><i class='bx bx-dots-vertical-rounded'></i>`;
        li.addEventListener("click", () => openEditModal(category.id));
        categoryList.appendChild(li);
      });
    })
    .catch((error) => console.error("Error fetching categories:", error));
}

// Close Modal
closeModalBtn.addEventListener("click", function () {
  editCategoryModal.style.display = "none";
});

// Close Modal When Clicking Outside
window.addEventListener("click", function (event) {
  if (event.target === editCategoryModal) {
    editCategoryModal.style.display = "none";
  }
});

// Fetch Categories on Page Load
fetchCategories();

function closeModal() {
  document.getElementById("editCategoryModal").style.display = "none";
}

function openEditModal(categoryId) {
  let modal = document.getElementById("editCategoryModal");
  let categoryNameInput = document.getElementById("categoryName");

  // Find the clicked category element
  let categoryElement = document.querySelector(`li[data-id='${categoryId}'] p`);

  if (categoryElement) {
    categoryNameInput.value = categoryElement.textContent.trim(); // Set category name
  }

  modal.style.display = "block";

  const formData = new FormData();
  formData.append("action", "get_category");
  formData.append("category_id", categoryId);

  fetch("../category_process.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("editCategoryId").value = data.id;
      document.getElementById("categoryName").value = data.category_name;
      document.getElementById("price").value = data.avg_cost;
      document.getElementById("numTrips").value = data.avg_days;
      document.getElementById("active").checked = data.active == "1";
      document.getElementById("editCategoryModal").style.display = "block";
    })
    .catch((error) => console.error("Error fetching category details:", error));
}

function saveChanges() {
  const formData = new FormData();
  formData.append("action", "update");
  formData.append(
    "category_id",
    document.getElementById("editCategoryId").value
  );
  formData.append(
    "category_name",
    document.getElementById("categoryName").value
  );
  formData.append("price", document.getElementById("price").value);
  formData.append("trips", document.getElementById("numTrips").value);
  formData.append(
    "active",
    document.getElementById("active").checked ? "1" : "0"
  );

  fetch("../category_process.php", { method: "POST", body: formData })
    .then((response) => response.json())
    .then((data) => {
      alert(data.message);
      closeModal();
      location.reload();
    });
}

function deleteCategory() {
  const categoryId = document.getElementById("editCategoryId").value;

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("../category_process.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=delete&category_id=${categoryId}`,
      })
        .then((response) => response.json())
        .then((data) => {
          Swal.fire({
            title: "Deleted!",
            text: data.message,
            icon: "success",
            timer: 2000,
            showConfirmButton: false,
          });

          closeModal();
          setTimeout(() => location.reload(), 2000);
        })
        .catch((error) => console.error("Error deleting category:", error));
    }
  });
}
