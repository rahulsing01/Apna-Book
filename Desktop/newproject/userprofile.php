<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Static Template</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
    />

    <style>

/* .action {
  position: fixed;
  top: 20px;
  right: 30px;
} */

.action .profile {
  position: relative;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.action .profile img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.action .menu {
  position: absolute;
  top: 120px;
  right: 105px;
  padding: 10px 0px;
  background: #c7fff9;
  width: 240px;
  box-sizing: 0 5px 25px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  transition: 0.5s;
  visibility: hidden;
  opacity: 0;
}

.action .menu.active {
  top: 122px;
  visibility: visible;
  opacity: 1;
  z-index: 1;
}

.action .menu::before {
  content: "";
  position: absolute;
  top: -10px;
  right: 28px;
  width: 20px;
  height: 20px;
  background: #c7fff9;
  transform: rotate(45deg);
}

.action .menu h3 {
  width: 100%;
  text-align: center;
  font-size: 18px;
  padding: 20px 0;
  font-weight: 500;
  color: #555;
  line-height: 1.5em;
}

.action .menu h3 span {
  font-size: 14px;
  color: #555;
  font-weight: 300;
}

.action .menu ul li {
  list-style: none;
  padding: 16px 0;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
}

.action .menu ul li img {
  max-width: 20px;
  margin-right: 10px;
  opacity: 0.5;
  transition: 0.5s;
}

.action .menu ul li:hover img {
  opacity: 1;
}

.action .menu ul li a {
  display: inline-block;
  text-decoration: none;
  color: #555;
  font-weight: 500;
  transition: 0.5s;
}

.action .menu ul li:hover a {
  color: #f85a40;;
}

    </style>
  </head>
  <body>
    <div class="action">
      <div class="profile" onclick="menuToggle();">
        <img src="./img/usericon/user.png" />
      </div>
      <div class="menu">
        <h3><?php echo "$username"; ?><br /><span>Website Designer</span></h3>
        <ul>
          <li>
            <img src="./img/usericon/user.png" /><a href="#">My profile</a>
          </li>
          <li>
            <img src="./img/usericon/edit.png" /><a href="#">Edit profile</a>
          </li>
          <li>
            <img src="./img/usericon/envelope.png" /><a href="#">Inbox</a>
          </li>
          <li>
            <img src="./img/usericon/settings.png" /><a href="#">Setting</a>
          </li>
          <li><img src="./img/usericon/question.png" /><a href="#">Help</a></li>
          <li>
            <img src="./img/usericon/log-out.png" /><a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <script>
      function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
      }
    </script>
  </body>
</html>

