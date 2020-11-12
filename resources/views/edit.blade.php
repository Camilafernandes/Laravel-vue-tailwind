<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="max-h-full py-8 px-8">
            <form id="app" @submit.prevent="getFormValues" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2"> Nome </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="name" name="name" type="text" placeholder="Nome" value="{{ $user->name }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Data de nascimento
                    </label>

                    <vuejs-datepicker  v-on:selected="doSelection()" :format="customFormatter" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:outline-none focus:shadow-outline" 
                        id="birthday" name="birthday" value="" placeholder="Data de nascimento">
                    </vuejs-datepicker>
                   
                </div>
                <div class="mb-6" v-if="visible >= 18">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Carteira de motorista
                    </label>
                    
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none 
                        focus:shadow-outline" id="driver_license" type="text" value="">
                    <vuejs-datepicker :format="customFormatter" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:outline-none" 
                        id="issued_at" name="issued_at" value="" placeholder="validade">
                    </vuejs-datepicker>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Estado
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="state" type="text" value="{{ $user->state }}">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Cidade
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="city" type="text" value="{{ $user->city }}">
                </div>
                @if(isset($user->phones[0]))
                <div class="mb-6" v-show="phones_1">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Telefones
                    </label>
                    <input class="shadow appearance-none border rounded w-1/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="ddd" type="text" value="">
                     <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" value="">
                    <label class="appearance-none inline-flex items-center  w-1/12 rounded py-2 px-3">
                        <input type="radio" class="form-radio" name="mains" value="personal">
                        <span class="ml-2">Principal</span>
                    </label>
                    <label class="bg-transparent hover:text-red-500 text-red-700  w-2/12  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-10"
                        @click="removePhones(1)">
                        Remover
                    </label>
                </div>
                @endif
                @if(isset($user->phones[1]))
                <div class="mb-6" v-show="phones_2">
                     <input class="shadow appearance-none border rounded w-1/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="ddd" type="text" value="">
                     <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" value="">
                    <label class="appearance-none inline-flex items-center w-1/12 rounded py-2 px-3">
                        <input type="radio" class="form-radio" name="mains" value="personal">
                        <span class="ml-2">Principal</span>
                    </label>
                    <label class="bg-transparent hover:text-red-500 text-red-700  w-2/12  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-10"
                        @click="removePhones(2)">
                        Remover
                    </label>
                </div>
                @endif
                @if(isset($user->phones[2]))
                <div class="mb-6" v-show="phones_3">
                     <input class="shadow appearance-none border rounded w-1/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="ddd" type="text" value="">
                     <input class="shadow appearance-none border rounded w-6/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" value="">
                    <label class="appearance-none inline-flex items-center w-1/12 rounded py-2 px-3">
                        <input type="radio" class="form-radio" name="mains" value="personal">
                        <span class="ml-2">Principal</span>
                    </label>
                    <label class="bg-transparent hover:text-red-500 text-red-700  w-2/12  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-10"
                        @click="removePhones(3)">
                        Remover
                    </label>
                </div>
                @endif
                <div class="mb-6" v-show="emails_1">
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        E-mails
                    </label>
                    <input class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="emails" type="email" value="">
                    <label class="bg-transparent hover:text-red-500 text-red-700  w-2/12  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-10"
                        @click="removeEmails(1)">
                        Remover
                    </label>
                </div>
                <div class="mb-6" v-show="emails_2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        E-mails
                    </label>
                    <input class="shadow appearance-none border rounded w-9/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="emails" type="email" value="">
                    <label class="bg-transparent hover:text-red-500 text-red-700  w-2/12  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-10"
                        @click="removeEmails(2)">
                        Remover
                    </label>
                </div>
                <div class="mb-6" v-show="emails_3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        E-mails
                    </label>
                    <input class="shadow appearance-none border rounded w-9/12  py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="emails" type="email" value="">
                    <label class="bg-transparent hover:text-red-500 text-red-700  w-2/12  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-10"
                        @click="removeEmails(3)">
                        Remover
                    </label>
                </div>
                <div class="mb-6" v-if="visible < 18">
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        Responsável
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-5" 
                        id="parent_name" name="parent_name" type="text" placeholder="Nome Responsável" value="">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
                        id="parent_phone" type="text" placeholder="Telefone Responsável" value="">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="summit">
                        Salvar Cliente
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vuejs-datepicker/1.6.2/vuejs-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<script>
    new Vue({
    el: '#app',
    components: {
        vuejsDatepicker
    },
    data: {
        name: '',
        birthday: '',
        state: '', 
        city: '',
        driver_license: '',
        issued_at: '',
        visible: null,
        parent: null,
        phones_1: true,
        phones_2: true,
        phones_3: true,
        emails_1: true,
        emails_2: true,
        emails_3: true,
    },
    methods: {
        getFormValues (submitEvent) {
            this.name = submitEvent.target.elements.name.value
            this.city = submitEvent.target.elements.city.value
            this.state = submitEvent.target.elements.state.value
            this.driver_license = submitEvent.target.elements.driver_license.value
            this.issued_at = submitEvent.target.elements.issued_at.value
            
            gravar = true;
            if  (!this.birthday) {
                alert("Campo Data de Nascimento obrigatório");
                gravar = false;
            } else {
                date = moment().diff(this.birthday, 'years');
            }

            if (date >= '18' && !this.driver_license) {
                alert("Campo Carteira de motorista obrigatório");
                gravar = false;
            }

            if (date >= '18' && !this.issued_at) {
                alert("Campo Validade Carteira de motorista obrigatório");
                gravar = false;
            }

            if (!this.name) {
                alert("Campo Nome obrigatório");
                gravar = false;
            }

            if (!this.city) {
                alert("Campo Cidade obrigatório");
                gravar = false;
            }

            if (!this.state) {
                alert("Campo state obrigatório");
                gravar = false;
            }

            if (gravar) {
                alert ("Formulário enviado com sucesso!")
            }
        },
        openModal(data) {
            console.log(data);
        },
        doSelection: function() {
            dateunformated = this.$children[0].selectedDate
            date = moment().diff(dateunformated, 'years');
            console.log(date);
            this.visible = date;

            this.birthday = dateunformated;
        },
        customFormatter(date) {
            return moment(date).format('DD/MM/YYYY');
        },
        removePhones(data){
            if (data == 1) {
                this.phones_1 = null;
            } else if (data == 2) {
                this.phones_2 = null;
            } else if (data == 3) {
                this.phones_3 = null;
            }
        },
        removeEmails(data) {
            if (data == 1) {
                this.emails_1 = null;
            } else if (data == 2) {
                this.emails_2 = null;
            } else if (data == 3) {
                this.emails_3 = null;
            }
        }
    }
    });
</script>
