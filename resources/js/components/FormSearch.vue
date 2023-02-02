<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import { store } from '../data/store';

export default {
    name: 'FormSearch',
    data() {
        return {
            tosearch: '',
            store
        }
    },
    methods: {
        getApi() {

            axios.get(BASE_URL + 'projects/search', {
                params: {
                    tosearch: this.tosearch
                }
            })
                .then(result => {
                    this.tosearch = '';
                    store.projects = result.data;
                    store.show_paginate = false;
                })
        }
    }
}
</script>

<template>
    <input v-model.trim="tosearch" type="text" @keyup.enter="getApi" placeholder="Search">
    <button @click="getApi">Send</button>
</template>


<style lang="scss" scoped>
input {
        margin-bottom: 40px;
        padding: 8px 10px;
        border-radius: 4px;
        border: 1px solid #919191;
        background-color: #e1e1e1;
    }
button {
        padding: 7px 10px;
        width: 60px;
        color: #737373;
        cursor: pointer;
        margin-left: 5px;
    }
</style>
