<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import { store } from '../data/store';
export default {
    name: 'AsideTypeTechnology',
    data() {
        return {
            store
        }
    },
    methods: {
        getApiByTypeTechnology(uri, id) {
            axios.get(`${BASE_URL}projects/${uri}/${id}`)
                .then(result => {
                    store.projects = result.data;
                    store.show_paginate = false;
                })
        },
        setMainTitle(title) {
            store.main_title = title;
        }
    }
}
</script>

<template>
    <aside>
        <div class="categories">
            <h2>Types</h2>

            <button v-for="type in store.types" :key="'types'+type.id" @click="getApiByTypeTechnology('project-type', type.id);
            setMainTitle('List project by type ' + type.name)"
            >
                {{ type.name }}

            </button>

            <h2>Technologies</h2>
            <button v-for="technology in store.technologies" :key="'technologies' + technology.id" @click="getApiByTypeTechnology('project-technology', technology.id);
                        setMainTitle('List project by technology ' + technology.name)">
                {{ technology.name }}

            </button>

            <button @click="$emit('getApi')">
                All Projects
            </button>
        </div>
    </aside>
</template>


<style lang="scss" scoped>
.categories {
            padding-left: 90px;

            button {
                display: block;
                margin: 20px 0;
                padding: 5px 10px;
            }
        }
</style>
