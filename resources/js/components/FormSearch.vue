<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';

export default {
    name: 'FormSearch',
    data() {
        return {
            tosearch: '',
        }
    },
    methods: {
        getApi() {

            const data = new FormData();
            data.append('tosearch', this.tosearch);

            axios.post(BASE_URL + 'projects/search', data)
                .then(result => {
                    console.log(result.data);
                })
        }
    }
}
</script>

<template>
    <input v-model.trim="tosearch" type="text" placeholder="Search">
    <button @click="getApi">Send</button>

</template>


<style lang="scss" scoped>
input {
        margin-bottom: 40px;
        padding: 5px 10px;
        border-radius: 4px;
        border: 1px solid #919191;
    }
button {
        padding: 5px 10px;
        width: 60px;
        color: #737373;
        cursor: pointer;
        margin-left: 5px;
    }
</style>
