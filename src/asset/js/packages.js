document.addEventListener("DOMContentLoaded", function () {
  const addPackageBtn = document.getElementById("add-package-btn");
  const newPackageForm = document.getElementById("new-package-form");
  const savePackageBtn = document.getElementById("save-package-btn");
  const packageContainer = document.getElementById("package-container");

  addPackageBtn.addEventListener("click", function () {
    newPackageForm.style.display = "block";
  });

  savePackageBtn.addEventListener("click", function () {
    const newName = document.getElementById("new-name").value;
    const newDescription = document.getElementById("new-description").value;
    const newPrice = document.getElementById("new-price").value;

    if (newName && newDescription && newPrice) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "crud.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          alert(xhr.responseText);
          location.reload(); // Reload the page to see the new package
        }
      };
      xhr.send(
        `name=${newName}&description=${newDescription}&price=${newPrice}`
      );
    } else {
      alert("Harap isi semua field!");
    }
  });
});
