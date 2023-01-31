<script>
import axios from 'axios';
import { BASE_URL } from '../data/data'

export default {
    name: 'ContactForm',
    data() {
        return {
            name: '',
            email: '',
            object: '',
            message: '',
            errors: {},
            loading: false,
            show: true
        }
    },
    methods: {
        sendForm() {
            this.loading = true;
            const data = {
                name: this.name,
                email: this.email,
                object: this.object,
                message: this.message
            }

            axios.post(BASE_URL + 'contacts', data)
                .then(result => {
                    this.loading = false;
                    this.show = false;
                    if (!result.data.success) {
                        this.errors = result.data.errors;
                    } else {
                        this.name = '';
                        this.email = '';
                        this.object = '';
                        this.message = '';
                        this.errors = {};
                    }
                })
        }
    }

}
</script>

<template>
    <div v-if="show">
    <h3>For any information please contact me:</h3>
    <form @submit.prevent="sendForm()">
        <div>
            <input :class="{'is-invalid' : errors.name}" v-model.trim="name" type="text" placeholder="Name">
            <p v-for="(error, index) in errors.name" :key="'name' + index" class="error">{{ error }}</p>
        </div>
        <div>
            <input :class="{'is-invalid' : errors.email}" v-model.trim="email" type="text" placeholder="Email">
            <p v-for="(error, index) in errors.email" :key="'email' + index" class="error">{{ error }}</p>
        </div>
        <div>
            <input :class="{'is-invalid' : errors.object}" v-model.trim="object" type="text" placeholder="Object">
            <p v-for="(error, index) in errors.object" :key="'object' + index" class="error">{{ error }}</p>
        </div>
        <div>
           <textarea :class="{'is-invalid' : errors.message}" v-model.trim="message" name="" id="" cols="30" placeholder="Message" rows="10"></textarea>
           <p v-for="(error, index) in errors.message" :key="'message' + index" class="error">{{ error }}</p>
        </div>
        <button type="submit" :disabled="loading">{{ loading ? 'Sending email...' : 'Send' }}</button>
    </form>
    </div>

    <h3 v-else>Thanks! your Email was successfully sent!</h3>

</template>


<style lang="scss" scoped>
form {
        text-align: center;
    }
    div {
        padding-bottom: 20px;
    }
    input, textarea {
        width: 80%;
        padding: 9px 15px;
        border-radius: 4px;
        border: 1px solid #919191;
        box-shadow: 0.5px 2px 4px 1px rgba($color: #919191, $alpha: 0.6);
    }
    button {
        padding: 8px 8px;
        width: 80%;
        font-size: 0.6rem;
        color: #737373;
        text-transform: uppercase;
        cursor: pointer;
    }
    .is-invalid {
        border: 1px solid red;
    }
    .error {
        font-size: 0.7rem;
        color: red;
        margin: 0;
    }
    h3 {
            text-align: center;
            padding-bottom: 30px;
            color: #616161;
            font-weight: lighter;
        }
</style>
