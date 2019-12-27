<template>
    <main class="bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <h2 style="margin-top: 100px">Записаться на игру</h2>
                <p class="lead" >Приглашаем Вас в мир настольных ролевых игр, в котором Вам подвластно все, ну или почти.</p>
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

                <h4 v-if="result === 'success'">Вас приветствует сбербанк</h4>

                <div class="col-md-6 order-md-1">
                    <form style="margin-bottom: 50px" @submit.prevent="send" v-if="result !== 'success'">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="firstname">Имя*</label>
                                    <input type="text" class="form-control" id="firstname" width="50%" v-model="firstname">
                                    <div class="error" v-if="$v.firstname.$anyError && !$v.firstname.required">Заполните «Имя».</div>
                                    <div class="error" v-if="$v.firstname.$anyError && !$v.firstname.maxLength">Максимальная длина 64 символа.</div>
                                </div>
                                <div class="col">
                                    <label for="lastName">Фамилия*</label>
                                    <input type="text" class="form-control" id="lastName" v-model="secondname">
                                    <div class="error" v-if="$v.secondname.$anyError && !$v.secondname.required">Заполните «Фамилию».</div>
                                    <div class="error" v-if="$v.secondname.$anyError && !$v.secondname.maxLength">Максимальная длина 64 символа.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" v-model="email">
                            <div class="error" v-if="$v.email.$anyError && !$v.email.required">Заполните «Email».</div>
                            <div class="error" v-if="$v.email.$anyError && !$v.email.email">Некорректный Email.</div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Номер телефона*</label>
                            <input type="text" class="form-control" id="phonenumber" v-model="phone">
                            <div class="error" v-if="$v.phone.$anyError && !$v.phone.required">Заполните «Телефон».</div>
                            <div class="error" v-if="$v.phone.$anyError && !$v.phone.phoneValidate">Некорректный телефон.</div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Компания*</label>
                                    <select class="form-control" id="exampleFormControlSelect1" v-model="gameId" @change="findPlots">
                                        <option value="">Выбрать...</option>
                                        <option v-for="game in games" v-bind:key="game.id" v-bind:value="game.id">{{game.title}}</option>
                                    </select>
                                    <div class="error" v-if="$v.gameId.$anyError && !$v.gameId.required">Выберите «Компанию».</div>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect2">Сюжет*</label>
                                    <select class="form-control" id="exampleFormControlSelect2" v-model="plotId" @change="findSessions">
                                        <option value="">Выбрать...</option>
                                        <option v-for="plot in plots" v-bind:key="plot.id" v-bind:value="plot.id">{{plot.title}}</option>
                                    </select>
                                    <div class="error" v-if="$v.plotId.$anyError && !$v.plotId.required">Выберите «Сюжет».</div>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect3">Сессия*</label>
                                    <select class="form-control" id="exampleFormControlSelect3" v-model="sessionId">
                                        <option value="">Выбрать...</option>
                                        <option v-for="session in sessions" v-bind:key="session.id" v-bind:value="session.id">{{session.title}}</option>
                                    </select>
                                    <small>что то там важное для новичка</small>
                                    <div class="error" v-if="$v.sessionId.$anyError && !$v.sessionId.required">Выберите «Сессию».</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Ваше сообщение для нас</label>
                            <textarea rows="4" name="message" id="message" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 105px;" v-model="message"></textarea>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address" v-model="radioButton">
                            <label class="custom-control-label" for="same-address">Типа да я разрешаю присылать мне сообщения на почту и номер телефона</label>
                            <div class="error" v-if="$v.radioButton.$anyError && !$v.radioButton.required">Согласитесь с рассылкой.</div>
                        </div>

                        <button class="btn btn-secondary" >Оплата</button>
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
                date: '2019-01-01',
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
                        firstname: this.firstname,
                        secondname: this.secondname,
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
        },
        created() {
           HTTP.get('/games')
                .then(response => (this.games = response.data));
        },

    }
</script>


<style scoped>

</style>