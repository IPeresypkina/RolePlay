<template>
    <main class="bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <h2 style="margin-top: 100px">Записаться на игру</h2>
                <p class="lead" >Приглашаем Вас в мир настольных ролевых игр, в котором Вам подвластно все, ну или почти.</p>
                <h4 v-if="result === 'success'" id="sberbank" style="color: #1e7e34">Вас приветствует сбербанк</h4>
            </div>
            <!--полосочка-->

            <hr style="border-bottom: 2px solid #555;">

            <div class="row">
                <div class="col-md-6 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <!--(span)Контейнер для строчных элементов. Можно использовать для форматирования отрывков текста, например, выделения цветом отдельных слов.-->
                        <span class="text-muted">Ближайшие дни проведения</span>
                    </h4>
                    <!--календарь-->
                    <date-pick
                            v-model="date"
                            :hasInputElement="false"
                    ></date-pick>
                    <!---->
                </div>


                <div class="col-md-6 order-md-1" >
                    <form style="margin-bottom: 50px" @submit.prevent="send">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="firstname">Имя*</label>
                                    <input type="text" class="form-control" id="firstname" width="50%" v-model="firstname">
                                    <div class="error" id="firstnameEmpty" v-if="$v.firstname.$anyError && !$v.firstname.required">Заполните «Имя».</div>
                                    <div class="error" id="firstnameMoreCharacters" v-if="$v.firstname.$anyError && !$v.firstname.maxLength">Максимальная длина 64 символа.</div>
                                </div>
                                <div class="col">
                                    <label for="lastName">Фамилия*</label>
                                    <input type="text" class="form-control" id="lastName" v-model="secondname">
                                    <div class="error" id="lastnameEmpty" v-if="$v.secondname.$anyError && !$v.secondname.required">Заполните «Фамилию».</div>
                                    <div class="error" id="lastnameMoreCharacters" v-if="$v.secondname.$anyError && !$v.secondname.maxLength">Максимальная длина 64 символа.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" v-model="email">
                            <div class="error" id="emailEmpty" v-if="$v.email.$anyError && !$v.email.required">Заполните «Email».</div>
                            <div class="error" id="emailIncorrect" v-if="$v.email.$anyError && !$v.email.email">Некорректный Email.</div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Номер телефона*</label>
                            <input type="text" class="form-control" id="phone" v-model="phone">
                            <div class="error" id="phoneEmpty" v-if="$v.phone.$anyError && !$v.phone.required">Заполните «Телефон».</div>
                            <div class="error" id="phoneIncorrect" v-if="$v.phone.$anyError && !$v.phone.phoneValidate">Некорректный телефон.</div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="game">Компания*</label>
                                    <select class="form-control" id="game" v-model="gameId" @change="findPlots">
                                        <option value="">Выбрать...</option>
                                        <option v-for="game in games" v-bind:key="game.id" v-bind:value="game.id">{{game.title}}</option>
                                    </select>
                                    <div class="error" id="gameEmpty" v-if="$v.gameId.$anyError && !$v.gameId.required">Выберите «Компанию».</div>

                                </div>
                                <div class="col">
                                    <label for="plot">Сюжет*</label>
                                    <select class="form-control" id="plot" v-model="plotId" @change="findSessions">
                                        <option value="">Выбрать...</option>
                                        <option v-for="plot in plots" v-bind:key="plot.id" v-bind:value="plot.id">{{plot.title}}</option>
                                    </select>
                                    <div class="error" id="plotEmpty" v-if="$v.plotId.$anyError && !$v.plotId.required">Выберите «Сюжет».</div>
                                </div>
                                <div class="col">
                                    <label for="session">Сессия*</label>
                                    <select class="form-control" id="session" v-model="sessionId" @change="findDate">
                                        <option value="">Выбрать...</option>
                                        <option v-for="session in sessions" v-bind:key="session.id" v-bind:value="session.id">{{session.title}}</option>
                                    </select>
                                    <div class="error" id="sessionEmpty" v-if="$v.sessionId.$anyError && !$v.sessionId.required">Выберите «Сессию».</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Ваше сообщение для нас</label>
                            <textarea rows="4" name="message" id="message" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 105px;" v-model="message"></textarea>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="form-check-input" id="mailing" v-model="radioButton">
                            <label class="form-check-label" for="mailing">Типа да я разрешаю присылать мне сообщения на почту и номер телефона</label>
                            <div class="error" id="mailingEmpty" v-if="$v.radioButton.$anyError && !$v.radioButton.required">Согласитесь с рассылкой.</div>
                        </div>

                        <button class="btn btn-secondary" type="submit" id="buy">Оплата</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</template>


<script>
    import {HTTP} from "../components/http";
    import {required, maxLength, email} from "vuelidate/src/validators";

    const phoneValidate = (value) => {
        return value.match(/(\+7|8)[- _]*\(?[- _]*(\d{3}[- _]*\)?([- _]*\d){7}|\d\d[- _]*\d\d[- _]*\)?([- _]*\d){6})/g) !== null;
    };

    import DatePick from 'vue-date-pick';
    import 'vue-date-pick/dist/vueDatePick.css';

    export default {
        name: "Record",
        components: {DatePick},
        data() {
            return {
                date: '',
                firstname: '',
                secondname: '',
                email: '',
                phone: '',
                result: '',
                gameId: '',
                plotId: '',
                sessionId: '',
                radioButton: '',
                message: '',
                calendarId: '',
                games: [],
                plots: [],
                sessions: [],
                dates: [],
            };
        },
        validations: {
            firstname: {
                required,
                maxLength: maxLength(64)
            },
            secondname: {
                required,
                maxLength: maxLength(64)
            },
            email: {
                required,
                email: email
            },
            phone: {
                required,
                phoneValidate
            },
            message: {
                maxLength: maxLength(128)
            },
            gameId: {
                required
            },
            plotId: {
                required
            },
            sessionId: {
                required
            },
            calendarId: {
                required
            },
            radioButton: {
                required
            }
        },

        methods: {
            send: function () {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    HTTP.post('/user/record', {
                        firstName: this.firstname,
                        secondName: this.secondname,
                        email: this.email,
                        phone: this.phone,
                        message: this.message,
                        calendarId: this.calendarId
                    }).then(
                        (response) => {
                            this.result = response.data.status;
                        },
                        (error) => {
                            this.result = error.response.data;
                        }
                    );
                }
            },
            findPlots: function () {
                HTTP.get('/plots/' + this.gameId)
                    .then(response => (this.plots = response.data));
            },
            findSessions: function () {
                HTTP.get('/sessions/' + this.plotId)
                    .then(response => (this.sessions = response.data));
            },
            findDate: function () {
                HTTP.get('/calendar/' + this.sessionId)
                    .then(response => {
                        this.dates = response.data;
                        for (var i = 0; i < this.dates.length; ++i) {
                            this.date = this.dates[i].date;
                            this.calendarId = this.dates[i].id;
                        }
                    });
            },
            findDateByCalendar: function () {
                //this.date = '2019-01-15';
                //this.date.background.red;
                for (var i = 0; i < this.sessions.length; i++){
                    if(this.sessions[i].id === this.date.sessionId){
                        this.date = this.date.date;
                        // eslint-disable-next-line no-undef
                        //var_dump(this.date.getErrorResults());
                    }
                }
            }
        },
        created() {
           HTTP.get('/games')
                .then(response => (this.games = response.data));
        },

    }
</script>


<style>
    .error {
        position: relative;
        font-size: 12px;
        color: red;
    }
</style>