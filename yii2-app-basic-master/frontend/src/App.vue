<template>
  <div id="app">
    <header class="header header-dark header-sticky">
      <div class="container">
        <div class="row">
          <div class="navbar navbar-expand-lg navbar-dark">
            <a href="/" id="indexHeader">
              <img src="../public/image/Image/logo44.png" height="30" width="160" class="d-inline-block align-top" alt=""/>
            </a>
            <!--<a href="index.html" class="navbar-brand order-1 order-lg-2"><img src="assets/images/logo.svg" alt="Logo"></a>-->
            <button class="navbar-toggler order-2 collapsed" type="button" data-toggle="collapse"
                    data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse order-3 order-lg-1 collapse item-navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <router-link to="/fantasy">
                    <a class="nav-link" id="fantasyHeader"  role="button" aria-haspopup="true"
                       aria-expanded="false">
                      Эсвас
                    </a>
                  </router-link>

                </li>
                <li class="nav-item dropdown item-nav-link">
                  <router-link to="/wasteland">
                  <a class="nav-link" id="wastelandHeader" href="views/Wasteland.vue" role="button" aria-haspopup="true"
                     aria-expanded="false">
                    Пустоши
                  </a>
                  </router-link>
                </li>
                <li class="nav-item dropdown item-nav-link">
                  <router-link to="/stalker">
                  <a class="nav-link" id="stalkerHeader" href="views/Stalker.vue" role="button" aria-haspopup="true" aria-expanded="false">
                    S.T.A.L.K.E.R.
                  </a>
                  </router-link>
                </li>
                <li class="nav-item item-nav-link">
                  <router-link to="/record">
                  <a class="nav-link" href="views/Record.vue" id="recordHeader">
                    Запись
                  </a>
                  </router-link>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main>
      <router-view/>
    </main>

    <footer class="footer_wrap">
      <div class="sns_area">
        <ul class="socialIcons">
          <li><a class="vk" href="https://vk.com/iracult"><i class="fa fa-vk"></i></a></li>
          <li><a class="twitter" href="https://vk.com/iracult"><i class="fa fa-twitter"></i></a></li>
          <li><a class="instagram" href="https://www.instagram.com/_iracult/"><i class="fa fa-instagram"></i></a></li>
          <li><a class="google" href="https://mail.google.com/mail/u/0/#inbox?compose=new"><i class="fa fa-google"></i></a></li>
        </ul>
      </div>
      <p class="text-center" style="margin-top: 30px; margin-bottom: 0">© 2019 Company, Inc.</p>
    </footer>

  </div>

</template>

<script>

</script>