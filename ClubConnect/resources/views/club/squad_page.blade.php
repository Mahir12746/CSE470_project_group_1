<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Squad</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <style>
    .football-field {
      position: relative;
      width: 1000px;
      height: 800px;
      background: url('/images/football-field.png') no-repeat;
      background-size: cover;
      align-items: center; 
    }
    .player {
      position: absolute;
      width: 40px;
      height: 40px;
      color: #fff;
      text-align: center;
      line-height: 40px;
      cursor: grab;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .player img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 2px solid white;
      box-sizing: border-box;
    }
  </style>
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('club.sidebar')
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">

      <!-- Header Start -->
      @include('club.header')
      <!-- Header End -->
      <div class="container-fluid">

        <!-- Football Field with Draggable Players -->
        <div class="football-field" id="footballField">
          <!-- Player positions -->
          @foreach ($players as $player)
            <div class="player" id="player{{ $player->id }}" style="top: {{ $player->position_y }}px; left: {{ $player->position_x }}px;">
              <img src="/player_images/{{ $player->pimage }}" alt="{{ $player->name }} Image">
              <span style="font-size: 12px; font-weight: bold; margin-top: 5px;">{{ $player->name }}</span>
            </div>
          @endforeach
          <!-- Add other player positions here... -->
        </div>
        
        <!-- Bottom Sub Players Section -->
        <div class="sub-players">

      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // JavaScript for Drag-and-Drop functionality
    document.addEventListener("DOMContentLoaded", function () {
      const field = document.getElementById("footballField");
      const players = document.querySelectorAll(".player");
      let currentElement, isDragging = false, offsetX, offsetY;

      // Function to save player positions to Local Storage
      function savePlayerPositions() {
        players.forEach((player) => {
          const id = player.id.replace("player", ""); // Get player ID from the element ID
          localStorage.setItem(`player${id}_x`, player.style.left);
          localStorage.setItem(`player${id}_y`, player.style.top);
        });
      }

      // Function to load player positions from Local Storage
      function loadPlayerPositions() {
        players.forEach((player) => {
          const id = player.id.replace("player", ""); // Get player ID from the element ID
          const x = localStorage.getItem(`player${id}_x`);
          const y = localStorage.getItem(`player${id}_y`);
          if (x && y) {
            player.style.left = x;
            player.style.top = y;
          }
        });
      }

      players.forEach((player) => {
        player.addEventListener("mousedown", (e) => {
          currentElement = e.target.closest(".player");
          isDragging = true;
          offsetX = e.clientX - currentElement.getBoundingClientRect().left;
          offsetY = e.clientY - currentElement.getBoundingClientRect().top;
          currentElement.style.pointerEvents = "none"; 
          currentElement.style.zIndex = "1"; 
          currentElement.style.cursor = "grabbing";
        });

        field.addEventListener("mousemove", (e) => {
          if (!isDragging) return;
          const x = e.clientX - offsetX - field.getBoundingClientRect().left;
          const y = e.clientY - offsetY - field.getBoundingClientRect().top;

          const maxX = field.clientWidth - currentElement.clientWidth;
          const maxY = field.clientHeight - currentElement.clientHeight;
          const clampedX = Math.max(0, Math.min(x, maxX));
          const clampedY = Math.max(0, Math.min(y, maxY));

          currentElement.style.left = clampedX + "px";
          currentElement.style.top = clampedY + "px";
        });

        field.addEventListener("mouseup", () => {
          isDragging = false;
          currentElement.style.pointerEvents = "auto"; 
          currentElement.style.zIndex = "0"; 
          currentElement.style.cursor = "grab";
          savePlayerPositions(); // Save 
        });

        player.addEventListener("click", () => {
          isDragging = !isDragging;
        });
      });

      loadPlayerPositions(); // Load 
    });
  </script>
</body>
</html>
