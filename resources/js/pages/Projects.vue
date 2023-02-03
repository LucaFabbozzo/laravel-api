<script>
import axios from 'axios';
import { BASE_URL } from '../data/data';
import { store } from '../data/store';
import ProjectItem from '../components/ProjectItem.vue'
import FormSearch from '../components/FormSearch.vue'
import AsideTypeTechnology from '../components/AsideTypeTechonology.vue'
export default {
    name: 'Projects',
    data() {
        return {
            BASE_URL,
            store,
            active_base_url: BASE_URL + 'projects'
        }
    },
    components: { ProjectItem, FormSearch, AsideTypeTechnology },
    methods: {
        getApi(url) {

            axios.get(url)
                .then(result => {
                    store.main_title = 'List Project';
                    store.projects = result.data.projects.data;
                    store.links = result.data.projects.links;
                    store.types = result.data.types;
                    store.technologies = result.data.technologies;
                    store.show_paginate = true;
                })
        },
    },
    mounted() {
        this.getApi(this.active_base_url);
    }
}
</script>

<template>
    <div class="wrapper">
        <div class="container-projects">
            <h1>{{ store.main_title }}</h1>
            <FormSearch />
            <div class="projects-container">
                <ProjectItem class="project-card" v-for="project in store.projects" :key="'project' + project.id" :project="project"/>
            </div>
            <div v-if="store.show_paginate" class="paginate">

                <button
                    v-for="link in store.links" :key="link.label"
                    :disabled="link.active || !link.url"
                    @click="getApi(link.url)"
                    v-html="link.label"></button>

            </div>
        </div>

        <AsideTypeTechnology @getApi="getApi()"/>

    </div>

</template>


<style lang="scss">
@use '../../scss/partials/vars' as *;
h1 {
        padding-bottom: 40px;
        text-transform: uppercase;
        font-size: 1.5rem;
        text-align: center;
    }
    .paginate {
        text-align: center;
        button {
            padding: 5px 8px;
            margin: 2px;
        }
    }
    .wrapper {
        display: flex;
        .container-post {
            width: 70%;
        }
    }
        .projects-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        .project-card {
                max-width: 280px;
                padding: 20px;
                background-color: #1b243b;
                border-radius: 5px;
                margin-bottom: 30px;

                h3 {
                    padding-bottom: 10px;

                    a {
                        color: $secondary-color;
                    }
                }
            }
        }
</style>
