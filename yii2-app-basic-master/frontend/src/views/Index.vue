<template>

    <div>

    <section class="jumbotron header">
        <div class="container">
            <div class="py-5 text-center" style="padding-top: 60px">
                <img src="/image/Image/logo4.png" height="200" width="500"/>
            </div>
        </div>
    </section>

    <!--Три кнопки под каждый мир-->
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-sm-6" >
                <router-link to="/fantasy">
                   class="card text-center hover-shadow-lg hover-translate-y-n10 world-item">

                    <div class="box">
                        <img src="/image/Image/fantasy2.jpg" height="200" width="348"/>
                    </div>
                    <div class="garinets_box" >
                        <h5>Эсвас</h5>
                        <p class="text-muted">
                            Зачистите темные подземелья и надурите каждого торговца в многочисленных городах мира Эсваса.
                            Спасайте драконов из башен от неугомонных принцесс и перепейте всех завсегдатев его таверн.
                            Судьба этого мира только в ваших руках.
                        </p>
                    </div>
                </router-link>
            </div>

            <div class="col-lg-4 col-sm-6">
                <router-link to="/wasteland">
                    <div class="card text-center hover-shadow-lg hover-translate-y-n10">
                        <div class="box">
                            <img src="/image/Image/postapac2.jpg" height="200" width="348"/>
                        </div>
                        <div class="garinets_box">
                            <h5>Пустоши</h5>
                            <p class="text-muted">
                                Цивилизация пала.
                                Остатки человечества пытаются сосуществовать на территориях непораженных радиацией.
                                Вступите в эту борьбу и станьте хозяином пустошей или подчинитесь ее диким законам…
                            </p>
                        </div>
                    </div>
                </router-link>
            </div>

            <div class="col-lg-4 col-sm-6">
                <router-link to="/stalker">
                <div class="card text-center hover-shadow-lg hover-translate-y-n10">
                    <div class="box">
                        <img src="/image/Image/stalker.jpg" height="200" width="348"/>
                    </div>
                    <div class="garinets_box">
                        <h5>S.T.A.L.K.E.R.</h5>
                        <p class="text-muted">
                            Зона отчуждения притягивает к себе самых разных посетителей.
                            Одни идут в нее от безысходности ища ответы,
                            другие же, учуяв запах легкой наживы, охотятся за мифическим кушем,
                            а третие грабят и первых, и вторых.
                            А что будите делать вы?
                        </p>
                    </div>
                </div>
                </router-link>
            </div>
        </div>
    </div>

    <main>
        <router-view/>
    </main>

    <section class="jumbotron jumbotron-footer">
        <div class="container text-center py-4" style="width: 630px; margin-left: 20px">
            <div class="lead display-1">
                Начните свое <p class="display-1">путешествие!</p>
            </div>
            <h4 class="lead">Приглашаем Вас в огромный мир настольных ролевых игр!</h4>
            <router-link to="/record">
            <a class="btn btn-secondary"> <p class="footerP">Запись</p></a>
            </router-link>
        </div>
    </section>

    </div>

</template>

<script>
    export default {
        name: "index"
    }
</script>

<style scoped>

</style>