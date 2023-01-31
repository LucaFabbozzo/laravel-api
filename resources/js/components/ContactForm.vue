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
        }
    },
    methods: {
        sendForm() {
            const data = {
                name: this.name,
                email: this.email,
                object: this.object,
                message: this.message
            }

            axios.post(BASE_URL + 'contacts', data)
                .then(result => {
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
        <button type="submit">Send</button>
    </form>

</template>


<style lang="scss" scoped>
    div {
        padding-bottom: 20px;
    }
    .is-invalid {
        border: 1px solid red;
    }
    .error {
        font-size: 0.7rem;
        color: red;
        margin: 0;
    }

</style>
