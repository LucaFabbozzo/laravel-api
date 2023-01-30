<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';

export default {
    name: 'FormSearch',
    data() {
        return {
            tosearch: '',
        }
    }
}
</script>

<template>
    <input v-model.trim="tosearch" type="text" placeholder="search">
    <button @click="getApi">Send</button>

</template>


<style>

</style>
