<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: logins.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="./output.css" />
  <style>

    .sidebar {
      position: fixed;
      top: 30px;
      right: -250px; 
      width: 200px;
      background-color: #6F0B0B;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: right 0.3s ease;
      z-index: 1000;
      border-top-left-radius: 50px; 
      border-bottom-left-radius: 50px; 
    }
    .sidebar a:last-child {
      margin-top: 100px; 
      margin-bottom: 10px; 
    }


    .sidebar.active {
      right: 0;
    }

    .sidebar a {
      display: block;
      width: 150px;
      height: 50px;
      padding: 15px;
      margin-top: 10px;
      margin-bottom: 0;
      background-color: #F5DEB3;
      color: #6f0b0b;
      text-align: center;
      text-decoration: none;
      border-radius: 20px;
      font-weight: bold;
    }
    .toggle-btn {
      top: 20px;
      right: 20px;
      cursor: pointer;
    }
    .overlay {
      display: none; 
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); 
      z-index: 999; 
    }
    .overlay.active {
      display: block;
    }
    body.body-lock-scroll {
      overflow: hidden; 
    }
  

  </style>
</head>
  <body class="bg-nav">
    
    <?php include "layout/header.php" ?>
     <!-- Sidebar -->
     <div class="sidebar" id="sidebar">
      <a href="EditProfil.php">Profile</a>
      <a href="Setting.php">Setting</a>
      <a href="pemilik.php">Start Selling</a>
      <a href="logout.php">Log Out</a>
    </div>
    <div class="overlay" id="overlay"></div>
    <section>
      <!-- Slider -->
      <div
        data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true
  }'
        class="relative"
      >
        <div
          class="hs-carousel relative overflow-hidden w-full min-h-[35.5rem] bg-white rounded-lg"
        >
          <div
            class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0"
          >
            <div class="hs-carousel-slide">
              <div
                class="flex justify-center h-full bg-gray-100 p-6 bg-no-repeat bg-cover bg-center dark:bg-items1"
                style="background-image: url(./asset/carousel/CT1.jpg)"
              >
                >
              </div>
            </div>
            <div class="hs-carousel-slide">
              <div
                class="flex justify-center h-full bg-gray-200 bg-no-repeat bg-cover bg-bottom bg-fixed p-6 dark:bg-neutral-800"
                style="background-image: url(./asset/carousel/BD2.jpg)"
              >
                >
              </div>
            </div>

            <div class="hs-carousel-slide">
              <div
                class="flex justify-center h-full bg-gray-200 bg-no-repeat bg-cover bg-center bg-fixed p-6 dark:bg-neutral-800"
                style="background-image: url(./asset/carousel/WD3.jpg)"
              >
                >
              </div>
            </div>

            <div class="hs-carousel-slide">
              <div
                class="flex justify-center h-full bg-no-repeat bg-cover bg-center bg-gray-300 p-6 dark:bg-neutral-700"
                style="background-image: url(./asset/carousel/CT4.jpg)"
              ></div>
            </div>
          </div>
        </div>

        <button
          type="button"
          class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10"
        >
          <span class="text-2xl" aria-hidden="true">
            <svg
              class="flex-shrink-0 size-5"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="m15 18-6-6 6-6"></path>
            </svg>
          </span>
          <span class="sr-only">Previous</span>
        </button>
        <button
          type="button"
          class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10"
        >
          <span class="sr-only">Next</span>
          <span class="text-2xl" aria-hidden="true">
            <svg
              class="flex-shrink-0 size-5"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="m9 18 6-6-6-6"></path>
            </svg>
          </span>
        </button>
      </div>

      
      <div class="mt-10 pb-20 flex justify-center gap-x-10 px-12">
        <div class="w-1/2 bg-primary rounded-3xl px-4 py-16">
          <h1 class="text-white font-bold text-center text-2xl mb-5">
          Rent Catering Equipment
          </h1>
          <img
            class="mx-auto"
            src="./asset/icons/CT1.png"
            alt=""
          />

          <p
            class="text-white text-center mt-10 max-w-[26.75rem] text-xl mx-auto"
          >
            EventGear Catering Equipment as a catering equipment rental center
            The largest and most complete in the Kemiling District area, Kota
            Bandar Lampung. With a wide choice of catering equipment
            high quality and affordable price.
          </p>
        </div>
        <div class="w-1/2 bg-primary rounded-3xl px-4 py-16">
          <h1 class="text-white font-bold text-center text-2xl mb-5">
            Decoration
          </h1>
          <img
            class="mx-auto"
            src="./asset/icons/WD2.png"
            alt=""
          />

          <p
            class="text-white text-center mt-10 max-w-[26.75rem] text-xl mx-auto"
          >
            EventGear Decoration, is a superior service provider with packages
            complete decoration, including various classic knick-knacks
            stunning. With an abundance of choices, EventGear is ready to beautify
            every event you have with a touch of luxury and class.
          </p>
        </div>
      </div>
    </section>

    <?php include "layout/footer.php"; ?>
   

    <script src="./../node_modules/preline/dist/preline.js"></script>
  <script>
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');
      overlay.classList.toggle('active');
      document.body.classList.toggle('body-lock-scroll');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.remove('active');
      overlay.classList.remove('active');
      document.body.classList.remove('body-lock-scroll');
    });
  </script>

  </body>
</html>
