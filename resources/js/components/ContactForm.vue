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
                    console.log(result.data);
                })
        }
    }

}
</script>

<template>
    <form @submit.prevent="sendForm()">
        <div>
            <input v-model.trim="name" type="text" placeholder="Name">
        </div>
        <div>
            <input v-model.trim="email" type="text" placeholder="Email">
        </div>
        <div>
            <input v-model.trim="object" type="text" placeholder="Object">
        </div>
        <div>
           <textarea v-model.trim="message" name="" id="" cols="30" placeholder="Message" rows="10"></textarea>
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
        font-size: 0.8rem;
        color: red;
        margin: 0;
    }

</style>
